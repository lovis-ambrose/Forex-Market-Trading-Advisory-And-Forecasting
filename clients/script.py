
import sys
import mysql.connector
from mysql.connector import Error
a =5
b=3

try:
    
    mydb = mysql.connector.connect(
        host="localhost",
        user="root",
        password=""
    )
    if mydb.is_connected():
        print("<scan class='text-dark font-weight-bold lead'>Connected to the database successfully", "</scan>", end="<br>")
    cursor=mydb.cursor()
    cursor = mydb.cursor(buffered=True)
    print("We are going to choose the database to CONNECT TO", end="<br><br>")

    cursor.execute("use forex")
    cursor.execute("select database() ")
    record = cursor.fetchone()

    print("<scan class='text-danger font-weight-bold lead'>Connected to database", record, "</scan>", end="<br><br>")
    cursor.execute("show tables")
    result = cursor.fetchall()
    print(result, end="<br>")

except mysql.connector.Error as error:
    print('Error while connecting to mySQL', error)
finally:
    if mydb.is_connected():
        cursor.close()
        mydb.close()
        print("MySQL connection is closed", end='')