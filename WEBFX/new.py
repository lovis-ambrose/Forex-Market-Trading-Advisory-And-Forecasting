from flask import Flask, render_template, jsonify


app = Flask(__name__)

@app.route('/')
def index():
    return "My name is Edward Kagimu, i love code and i wioll always be a programmer"

@app.route('/set')
def setCoockie():
    return "Setting the Project coockie"


@app.route('/get')
def getCoockie():
    return "The boys are programmers"

@app.route('/contact')
def contact():
    return render_template("contact.php")

if __name__== "__main__":
    app.run(debug=True)