myStorage = window.localStorage
userandpass = []

const acceso = () => {

    var user = document.getElementById("usu").value;
    var pass = document.getElementById("pass").value;

    fetch("http://localhost/psicologia/json/login.json")
        .then(response=>response.json())
        .then(usuariosArray=>{    

        for (i = 0; i <= 3; i++) {
            if (user == usuariosArray[i].email) {
                if (pass == usuariosArray[i].password) {

                    //userandpass.push(user)
                    //userandpass.push(pass)
                    userandpass.push(usuariosArray[i].nombre)
                    userandpass.push(usuariosArray[i].apellido)

                    //Guarda Nombre y apellido del usuario que ingreso en localStorage
                    myStorage.removeItem('Userinfo')
                    myStorage.setItem('Userinfo',JSON.stringify(userandpass))

                    if (usuariosArray[i].typeuser == "Administrador") {
                        window.location.href = "../html/inicioAdmin.html"                        
                    } else if (usuariosArray[i].typeuser == "Estudiante") {
                        window.location.href = "../html/inicioEstudiante.html"
                    } else if (usuariosArray[i].typeuser == "Psicologo") {
                        window.location.href = "../html/inicioPsicologo.html"
                    }
                } else {
                    alert('Contrseaña incorrecta')
                    i = 3
                }
            }
        }
    })
}