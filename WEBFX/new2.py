from flask import Flask,render_template,jsonify
from flask_cors import CORS

import datetime
import MetaTrader5 as mt5
import pandas as pd
import numpy as np
from datetime import timedelta
import pytz
from keras.models import load_model
from flask_apscheduler import APScheduler
import matplotlib
matplotlib.use('Agg')
import matplotlib.pyplot as plt
import mplfinance as mpf
from io import BytesIO
from matplotlib.backends.backend_agg import FigureCanvasAgg as FigureCanvas
import base64
import smtplib
from email.mime.text import MIMEText
from email.mime.multipart import MIMEMultipart
import mysql.connector
sender_email = 'innosta74@gmail.com'
sender_password = 'smqmfpvgoyphnjip'
app = Flask(__name__)
CORS(app)
model = load_model('N_candles.h5')
symbols = ["USDCHF", "USDCAD", "EURUSD", "GBPUSD", "AUDUSD", "NZDUSD", "EURGBP", "EURAUD", "EURNZD", "EURCAD", "EURCHF", "GBPAUD", "AUDCAD", "AUDCHF", "GBPNZD", "CADCHF", "GBPCAD", "AUDNZD"]

def generate_dataframes():
    if not mt5.initialize(): # type: ignore
        print("initialize() failed, error code =", mt5.last_error()) # type: ignore
        quit()
    mt5.login(login = 81043660, password="584Muh12",server="Exness-MT5Trial10") # type: ignore
       
    timezone = pytz.timezone("Europe/Tallinn")
    now = datetime.datetime.now(timezone)
    start = datetime.datetime.now(timezone) - timedelta(days=12)
    utc_from = datetime.datetime(start.year, start.month, start.day)
    utc_to = datetime.datetime(now.year, now.month, now.day, now.hour, now.minute, now.second)

    #symbols = ["USDCHFm", "USDCADm", "EURUSDm", "GBPUSDm", "AUDUSDm", "NZDUSDm", "EURGBPm", "EURAUDm", "EURNZDm", "EURCADm", "EURCHFm", "GBPAUDm", "AUDCADm", "AUDCHFm", "GBPNZDm", "CADCHFm", "GBPCADm", "AUDNZDm"]
    df_list = []

    for symbol in symbols:
        df_list.append(mt5.copy_rates_range(symbol, mt5.TIMEFRAME_M1, utc_from, utc_to)) # type: ignore
    df_list = [pd.DataFrame(dfstream) for dfstream in df_list]
    for i, df in enumerate(df_list):
        df['time'] = pd.to_datetime(df['time'], unit='s')
    return df_list

dataframes = generate_dataframes()
copied_dataframes = []

for df in dataframes:
    copied_df = df.copy()
    copied_dataframes.append(copied_df)
for df in dataframes:
    copied_df = df.copy()
    copied_dataframes.append(copied_df)
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
    df=df.set_axis(df['time'], copy=False)
columns_to_drop = ['open', 'high', 'low', 'real_volume','tick_volume','spread']
for df in dataframes:
    df.drop(columns_to_drop, axis=1, inplace=True)

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

    for i, df in enumerate(dataframes):
        df=df.set_axis(df['time'], copy=False)
        df.drop(['open', 'high', 'low', 'real_volume','tick_volume','spread'], axis=1, inplace=True)
        dataframes[i] = df

def predict():
    predictions = []
    for df in dataframes:
        look_back=42
        close_data = df['close'].values
        close_data = close_data.reshape((-1,1)) # type: ignore
        close_data = close_data.reshape((-1))
        x = close_data[-look_back:]
        x = x.reshape((1, look_back, 1))
        prediction = model.predict(x) # type: ignore
        predictions.append(np.round(prediction,5))
    return predictions


def calculate_pips():
    differences = []
    predictions = predict()
    last_values = []
    last_times = []
    for copied_df in copied_dataframes:
        tail_df = copied_df.loc[:, ['time', 'close']].tail(1)
        last_value = tail_df.iloc[0]['close']
        last_time = tail_df.iloc[0]['time']
        last_values.append(np.round(last_value,5))
        last_times.append(last_time)
    for forecast, last_value in zip(predictions, last_values):
        diff = round((forecast[0][0]-last_value) * 100000, 2)
        differences.append(diff)
    return differences, last_values, last_times


def analyze_market(symbols, dataframes):
    trends = {}
    for pair, df in zip(symbols, dataframes):
        # calculate the 20-period moving average
        ma_20 = np.mean(df['close'].rolling(window=12).mean())

        # calculate the 50-period moving average
        ma_50 = np.mean(df['close'].rolling(window=24).mean())

        # determine the trend based on the relative positions of the current price and the moving averages
        current_price = df['close'].iloc[-1]
        if current_price > ma_20 and current_price > ma_50:
            trend = "uptrend"
        elif current_price < ma_20 and current_price < ma_50:
            trend = "downtrend"
        else:
            trend = "mixed"
        
        trends[pair] = trend
    return trends

def generate_ohlc_charts(symbols, dataframes):
    charts = []

    for pair, df in zip(symbols, dataframes):
        # Convert the DataFrame to the required format for mplfinance
        ohlc_data = df[['time', 'open', 'high', 'low', 'close']]
        ohlc_data.set_index('time', inplace=True)
        ohlc_data.index = pd.to_datetime(ohlc_data.index)

        # Create the chart
        fig, ax = plt.subplots(figsize=(6, 3))

        # Specify colors for bearish and bullish candles
        colors = mpf.make_marketcolors(up='green', down='red')
        style = mpf.make_mpf_style(marketcolors=colors)

        # Plot the candlestick chart with the specified colors
        mpf.plot(ohlc_data, type='candle', ax=ax, warn_too_much_data=len(ohlc_data), style=style)

        # Calculate the moving averages
        ma_20 = df['close'].rolling(window=12).mean()
        ma_50 = df['close'].rolling(window=24).mean()

        # Plot the moving averages
        ax.plot(df.index, ma_20, label='MA 20', color='red')
        ax.plot(df.index, ma_50, label='MA 50', color='yellow')

        # Set the title and labels
        # ax.set_title(f'{pair} Price Trend')
        ax.set_xlabel('Time')
        ax.set_ylabel('Price')
        # ax.legend()

        # Convert the chart to a base64-encoded PNG string using canvas
        canvas = FigureCanvas(fig)
        img = BytesIO()
        canvas.print_png(img)
        chart_data = base64.b64encode(img.getvalue()).decode('utf-8')

        # Close the figure
        plt.close(fig)

        # Add the chart to the list
        charts.append(chart_data)

    # Return the list of charts
    return charts

# Function to fetch email addresses from the database
def get_user_emails():
    conn = mysql.connector.connect(host="localhost", database="forex", user="root", password="")
    cursor = conn.cursor()
    cursor.execute("SELECT email, fname, lname FROM f_clients")
    rows = cursor.fetchall()
    emails = [(row[0], row[1], row[2]) for row in rows]
    cursor.close()
    conn.close()
    return emails

#function to send notifications 
def send_email_notification(sender_email, sender_password, recipient_email, subject, name):
    # Create a multipart message object
    msg = MIMEMultipart()
    msg['From'] = sender_email
    msg['To'] = recipient_email
    msg['Subject'] = subject

    # Create the customized message
    message = f"Dear {name},\n\nNew forecasts have been generated by FMTAF System.Check them out and trade accordingly .We are here to help you defeat the forex market.Stay Safe!"

    # Add the message body
    msg.attach(MIMEText(message, 'plain'))

    # SMTP settings for Gmail
    smtp_server = 'smtp.gmail.com'
    smtp_port = 587

    try:
        # Create a secure connection with Gmail's SMTP server
        server = smtplib.SMTP(smtp_server, smtp_port)
        server.starttls()

        # Login to your Gmail account
        server.login(sender_email, sender_password)

        # Send the email
        server.sendmail(sender_email, recipient_email, msg.as_string())

        print("Notification sent successfully!")

    except Exception as e:
        print(f"Notification failed to {recipient_email} Error: {str(e)}")

    finally:
        # Close the connection to the SMTP server
        server.quit()


@app.route('/muhirefx')
def home():
        with app.app_context():
            return  render_template("index_2.html")
            #return jsonify(data)

@app.route("/test")
def test():
    with app.app_context():
        symbols = ["USDCHF", "USDCAD", "EURUSD", "GBPUSD", "AUDUSD", "NZDUSD", "EURGBP", "EURAUD", "EURNZD", "EURCAD", "EURCHF", "GBPAUD", "AUDCAD", "AUDCHF", "GBPNZD", "CADCHF", "GBPCAD", "AUDNZD"]
        #generate new data from the market
        dataframes = generate_dataframes()
        predicted_values = predict()
        pips, last_values, last_times = calculate_pips()
        trends = analyze_market(symbols, dataframes)
        charts=generate_ohlc_charts(symbols, dataframes)
        # Get the recipient emails from the database
        recipient_emails = get_user_emails()

        # Iterate through the recipient emails and send notifications
        for email, first_name, last_name in recipient_emails:
            subject = "New Forecast Generated"
            name = f"{first_name} {last_name}"
            send_email_notification(sender_email, sender_password, email, subject, name)

        data = []
        for i, pair in enumerate(symbols):
            pair_data = {'pair': pair,
                     'predicted_value': predicted_values[i][0][0].tolist(),
                     'previous_close': last_values[i],
                     'previous_time': last_times[i],
                     'pips': pips[i],
                     'trend': trends[pair],
                     'chart':charts[i]}
            data.append(pair_data)
        for item in data:
            print(item)
        return jsonify(data)


if __name__ == '_main_':
    scheduler = APScheduler()
    scheduler.add_job(id="data_extraction", func=extract_data, trigger='interval', minutes=2)
    scheduler.add_job(id="prediction", func=test, trigger='interval', minutes=3)


    # Start the scheduler
    scheduler.start()
    app.run(host='localhost', port=4000)