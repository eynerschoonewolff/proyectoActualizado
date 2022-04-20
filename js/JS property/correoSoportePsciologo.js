function SoporteEnvioPscicologo(){
    var validar=false
    var nombre = document.getElementById("nombreContacto");
    var emailContacto = document.getElementById("emailContacto");
    var telefonoContacto  = document.getElementById("telefonoContacto");
    var asuntoContacto  = document.getElementById("asuntoContacto");
    var Mensaje= document.getElementById("smsContacto");


    
    if(nombre!=""){
        validar=true
    }else{
        validar=false
    }
    if(validar==true){
        if(emailContacto!=""){
            validar=true
        }else{
            validar=false
        }
    }
    if(validar==true){
        if(telefonoContacto!=""){
            validar=true
        }else{
            validar=false
        }
    }
    if(validar==true){
        if(asuntoContacto!=""){
            validar=true
        }else{
            validar=false
        }
    }
    if(validar==true){
        if(Mensaje!=""){
            validar=true
        }else{
            validar=false
        }
    }

    if(validar==true){
        const jsoninfo={
            nombreInfo:nombre.value,
            emailContacte:emailContacto.value,
            telefonoContact:telefonoContacto.value,
            asuntoContact:asuntoContacto.value,
            MensajeContact:Mensaje.value
        }
        axios({
            method: 'POST',
            url: 'http://localhost:1000/Correos_pscicologo',
            data: jsoninfo
        }).then(response =>  {
            alert("mensaje enviado");
            nombre.value = "";
            emailContacto.value = "";
            telefonoContacto.value = "";
            asuntoContacto.value = "";
            Mensaje.value = "";
            document.formularioContacto3.BotonCheck3.checked=false
        }).catch(err => console.log('Error: ', err))};
    }




