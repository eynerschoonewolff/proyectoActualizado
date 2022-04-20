from flask import Flask, render_template, request
import smtplib
import ssl
from email.mime.text import MIMEText
from email.mime.multipart import MIMEMultipart
from flask_cors import CORS

app = Flask(__name__)
CORS(app)

@app.route('/Correos',methods=['POST'])
def Correos():
    Nombre=request.json['nombreInfo']
    email=request.json['emailContacte']
    telefono=request.json['telefonoContact']
    asunto=request.json['asuntoContact']
    mensaje_Soporte=request.json['MensajeContact']

    username='psciologiaContacto@gmail.com'
    password='ZHCzFvA65uRZ2rh'
    destinatario="psciologiaContacto@gmail.com"
    mensaje= MIMEMultipart("aleternative")



    mensaje["Subject"]=asunto
    mensaje["From"]=email
    mensaje["To"]=destinatario


    html=f"""
        <html>
        <body>
            Hola {destinatario} <br>
            <h1>Soporte de contacto general</h1> <br>
            Nombre:{Nombre} <br>
            Email:{email} <br>
            telefono:{telefono} <br>
            <h3>Mensaje: {mensaje_Soporte} </h3>
            
        </body>
        </html>
        """

    parte_html=MIMEText(html,"html")
    mensaje.attach(parte_html)
    context=ssl.create_default_context()

    with smtplib.SMTP_SSL("smtp.gmail.com",465,context=context) as server:
        server.login(username,password)
        server.sendmail(username,destinatario,mensaje.as_string())
    
    return {
        "mensaje":"realizado"
    }

@app.route('/Correos_estudiante',methods=['POST'])
def Correos_estudiante():
    Nombre=request.json['nombreInfo']
    email=request.json['emailContacte']
    telefono=request.json['telefonoContact']
    asunto=request.json['asuntoContact']
    mensaje_Soporte=request.json['MensajeContact']

    username='psciologiaContacto@gmail.com'
    password='ZHCzFvA65uRZ2rh'
    destinatario="psciologiaContacto@gmail.com"
    mensaje= MIMEMultipart("aleternative")

    mensaje["Subject"]=asunto
    mensaje["From"]=email
    mensaje["To"]=destinatario

    html=f"""
        <html>
        <body>
            Hola {destinatario} <br>
            <h1>Soporte de contacto del Estudiante</h1> <br>
            Nombre: {Nombre} <br>
            Email: {email} <br>
            telefono: {telefono} <br>
            <h3>Mensaje: {mensaje_Soporte} </h3>
            
        </body>
        </html>
        """

    parte_html=MIMEText(html,"html")
    mensaje.attach(parte_html)
    context=ssl.create_default_context()

    with smtplib.SMTP_SSL("smtp.gmail.com",465,context=context) as server:
        server.login(username,password)
        server.sendmail(username,destinatario,mensaje.as_string())
    
    return {
        "mensaje":"Enviado correctamente"
    }


@app.route('/Correos_pscicologo',methods=['POST'])
def Correos_pscicologo():
    Nombre=request.json['nombreInfo']
    email=request.json['emailContacte']
    telefono=request.json['telefonoContact']
    asunto=request.json['asuntoContact']
    mensaje_Soporte=request.json['MensajeContact']

    username='psciologiaContacto@gmail.com'
    password='ZHCzFvA65uRZ2rh'
    destinatario="psciologiaContacto@gmail.com"
    mensaje= MIMEMultipart("aleternative")

    mensaje["Subject"]=asunto
    mensaje["From"]=email
    mensaje["To"]=destinatario

    html=f"""
        <html>
        <body>
            Hola {destinatario} <br>
            <h1>Soporte de contacto del psciologo</h1> <br>
            Nombre: {Nombre} <br>
            Email: {email} <br>
            telefono: {telefono} <br>
            <h3>Mensaje: {mensaje_Soporte} </h3>
            
        </body>
        </html>
        """

    parte_html=MIMEText(html,"html")
    mensaje.attach(parte_html)
    context=ssl.create_default_context()

    with smtplib.SMTP_SSL("smtp.gmail.com",465,context=context) as server:
        server.login(username,password)
        server.sendmail(username,destinatario,mensaje.as_string())
    
    return {
        "mensaje":"Enviado correctamente"
    }


if __name__ == "__main__":
    app.run(port=1000, debug=True)
