      
from flask import Flask, render_template, jsonify
from flask_cors import CORS
from datetime import datetime, timedelta
import pytz
import MetaTrader5 as mt5
import pandas as pd
import numpy as np
from keras.models import load_model
from flask_apscheduler import APScheduler

app = Flask(__name__)
CORS(app)
model = load_model('N_candles.h5')
symbols = ["USDCHF", "USDCAD", "EURUSD", "GBPUSD", "AUDUSD", "NZDUSD", "EURGBP", "EURAUD", "EURNZD", "EURCAD", "EURCHF", "GBPAUD", "AUDCAD", "AUDCHF", "GBPNZD", "CADCHF", "GBPCAD", "AUDNZD"]

def generate_dataframes():
    if not mt5.initialize():
        print("initialize() failed, error code =", mt5.last_error())
        quit()
    mt5.login(login = 68508393, password="acdlcyl4",server="MetaQuotes-Demo") # type: ignore
       
    timezone = pytz.timezone("Europe/Tallinn")
    now = datetime.now(timezone)
    start = now - timedelta(days=150)
    utc_from = datetime(start.year, start.month, start.day)
    utc_to = datetime(now.year, now.month, now.day, now.hour, now.minute, now.second)

    df_list = []

    for symbol in symbols:
        df_list.append(mt5.copy_rates_range(symbol, mt5.TIMEFRAME_M5, utc_from, utc_to))
    
    df_list = [pd.DataFrame(dfstream) for dfstream in df_list]
    for i, df in enumerate(df_list):
        df['time'] = pd.to_datetime(df['time'], unit='s')
    
    return df_list

dataframes = []
copied_dataframes = []
last_values = []
last_times = []

def extract_data():
    global dataframes, copied_dataframes, last_values, last_times
    dataframes = generate_dataframes()
    copied_dataframes = [df.copy() for df in dataframes]
    
    tail_dataframes = []
    for copied_df in copied_dataframes:
        tail_df = copied_df.loc[:, ['time', 'close']].tail(1)
        tail_dataframes.append(tail_df)

    last_values = []
    last_times = []
    for tail_df in tail_dataframes:
        last_value = tail_df.iloc[0]['close']
        last_time = tail_df.iloc[0]['time']
        last_values.append(last_value)
        last_times.append(last_time)
    
    for df in dataframes:
        df.set_axis(df['time'], copy=False)
    
    print("Data extraction completed.")

def predict():
    predictions = []
    for df in dataframes:
        look_back = 42
        close_data = df['close'].values
        close_data = close_data.reshape((-1, 1))
        close_data = close_data.reshape((-1))
        x = close_data[-look_back:]
        x = x.reshape((1, look_back, 1))
        prediction = model.predict(x)
        predictions.append(prediction)
    return predictions

def calculate_pips():
    differences = []
    predictions = predict()
    for forecast, last_value in zip(predictions, last_values):
        diff = round((forecast[0][0] - last_value) * 100000, 2)
        differences.append(diff)
    return differences, last_values, last_times

def analyze_market(symbols, dataframes):
    trends = {}
    for pair, df in zip(symbols, dataframes):
        ma_20 = np.mean(df['close'].rolling(window=12).mean())
        ma_50 = np.mean(df['close'].rolling(window=36).mean())

        current_price = df['close'].iloc[-1]
        if current_price > ma_20 and current_price > ma_50:
            trend = "uptrend"
        elif current_price < ma_20 and current_price < ma_50:
            trend = "downtrend"
        else:
            trend = "mixed"
        
        trends[pair] = trend
    return trends

@app.route('/muhirefx')
def home():
    with app.app_context():
        return render_template("me.html")

@app.route("/test")
def test():
    with app.app_context():
        predicted_values = predict()
        pips, last_values, last_times = calculate_pips()
        trends = analyze_market(symbols, dataframes)

        data = []
        for i, pair in enumerate(symbols):
            pair_data = {
                'pair': pair,
                'predicted_value': predicted_values[i][0][0].tolist(),
                'previous_close': last_values[i],
                'previous_time': last_times[i],
                'pips': pips[i],
                'trend': trends[pair]
            }
            data.append(pair_data)
        
        print(data)
        return jsonify(data)

if __name__ == '__main__':
    scheduler = APScheduler()
    scheduler.add_job(id="data_extraction", func=extract_data, trigger='interval', minutes=2)
    scheduler.add_job(id="prediction", func=test, trigger='interval', minutes=2.3)

    # Start the scheduler
    scheduler.start()
    app.run(host='localhost', port=4000)

       
