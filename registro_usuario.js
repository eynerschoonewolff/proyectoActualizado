let form = document.getElementById("formularioRegistro");
let tabla = document.getElementById("tabla");

form.addEventListener("submit", function(evento) {

    evento.preventDefault();
    let formularioRegistro = new FormData(form);
    let datosUsuario = {
        nombres: formularioRegistro.get("nombres"),
        Apellidos: formularioRegistro.get("Apellidos"),
        Usuario: formularioRegistro.get("Usuario"),
        Contraseña: formularioRegistro.get("Contraseña"),
        Correo: formularioRegistro.get("Correo"),
    };
    

    agregarFila(datosUsuario);
});
let filasNumero = 0;
function agregarFila(datosUsuario) {
    let fila = tabla.insertRow(-1);
    let claseFila = 'fila' + filasNumero;
    filasNumero ++;
    fila.classList = [claseFila];

    let columnaNombre = fila.insertCell(0);
    
    let clasesNombre = 'nombre' + filasNumero + ' ' + claseFila;
    crearElementoSpan(clasesNombre, datosUsuario.nombres, columnaNombre)
    agregarInput(columnaNombre, datosUsuario.nombres, clasesNombre);
    
    let columnaApellidos = fila.insertCell(1);
    
    clasesApellido = 'apellido' + filasNumero + ' ' + claseFila;
    crearElementoSpan(clasesApellido, datosUsuario.Apellidos, columnaApellidos)
    agregarInput(columnaApellidos, datosUsuario.Apellidos, clasesApellido);

    columnaUsuario = fila.insertCell(2);
    
    
    clasesUsuario = 'usuario' + filasNumero + ' ' + claseFila;
    crearElementoSpan(clasesUsuario, datosUsuario.Usuario, columnaUsuario)
    agregarInput(columnaUsuario, datosUsuario.Usuario, clasesUsuario);
    
    columnaContraseña = fila.insertCell(3);
    
    clasesContraseña = 'contraseña' + filasNumero + ' ' + claseFila;
    crearElementoSpan(clasesContraseña, datosUsuario.Contraseña, columnaContraseña)
    agregarInput(columnaContraseña, datosUsuario.Contraseña, clasesContraseña);

    ColummnaCorreo = fila.insertCell(4);
    
    clasesCorreo = 'correo' + filasNumero + ' ' + claseFila;
    crearElementoSpan(clasesCorreo, datosUsuario.Correo, ColummnaCorreo)
    agregarInput(ColummnaCorreo, datosUsuario.Correo, clasesCorreo);

    
    let eliminarCelda = fila.insertCell(5);
    let botonEliminar  = document.createElement("button");
    botonEliminar.textContent = "Eliminar";
    botonEliminar.classList = ['btn btn-danger'];
    eliminarCelda.appendChild(botonEliminar);
    
    botonEliminar.addEventListener("click", (evento) => {
        alert("Se hizo click en eliminar");
        evento.target.parentNode.parentNode.remove();
    });
    
    let editarCelda = fila.insertCell(5);
    let botonEditar  = document.createElement("button");
    botonEditar.textContent = "Editar";
    botonEditar.classList = ['btn btn-success ' + claseFila];
    editarCelda.appendChild(botonEditar);

    let botonAceptar  = document.createElement("button");
    botonAceptar.textContent = "Aceptar";
    botonAceptar.classList = ['btn btn-success d-none ' + claseFila];
    editarCelda.appendChild(botonAceptar);

    botonAceptar.addEventListener('click',function () {
        let inputs = document.querySelectorAll('input.' + claseFila);
        inputs.forEach(function(elemento) {
            elemento.classList.add('d-none');
        });
        botonAceptar.classList.add('d-none');
        botonEditar.classList.remove('d-none');

        textoVisible = document.querySelectorAll('span.' + claseFila);
        textoVisible.forEach(function(elemento) {
            elemento.classList.remove('d-none');
        });

        guardarCambio(clasesNombre);
        guardarCambio(clasesApellido);
        guardarCambio(clasesUsuario);
        guardarCambio(clasesContraseña);
        guardarCambio(clasesCorreo);

    })

    botonEditar.addEventListener('click',function () {
        let elementos_fila_ocultos = document.querySelectorAll('input.' + claseFila);
        elementos_fila_ocultos.forEach(function(elemento) {
            elemento.classList.remove('d-none');
        });
        botonAceptar.classList.remove('d-none')
        botonEditar.classList.add('d-none')
        
        textoVisible = document.querySelectorAll('span.'+claseFila)
        textoVisible.forEach(function(elemento) {
            elemento.classList.add('d-none');
        });
    })

    
    Guardar_localStorage(datosUsuario);
}

function agregarInput(contenedor, value, clases) {
    var input = document.createElement("input");
    input.type = "text";
    input.className = "d-none " + clases;
    input.style.width = '150px';
    input.value = value;
    contenedor.appendChild(input);
}


function Guardar_localStorage(datosUsuario){
    let arraylocalStorage=JSON.parse(localStorage.getItem("Info")) || [];
    arraylocalStorage.push(datosUsuario)
    let GuardarDatosArray=JSON.stringify(arraylocalStorage);
    localStorage.setItem("Info",GuardarDatosArray)
}

function clearForm() {
    document.querySelector("#nombres").value = "";
    document.querySelector("#Apellidos").value = "";
    document.querySelector("#Usuario").value="";
    document.querySelector("#Contraseña").value="";
    document.querySelector("#Correo").value="";
}


function crearElementoSpan(claseFila, texto, contenedor) {
    element_span_nombre = document.createElement('span');
    element_span_nombre.className = claseFila;
    element_span_nombre.textContent = texto;
    contenedor.appendChild(element_span_nombre);
}

function guardarCambio(clase) {
    let nuevo_valor = document.querySelector('input.' + clase.replace(/ /g,".")).value;
    let span = document.querySelector('span.'+ clase.replace(/ /g,"."));
    span.textContent = nuevo_valor;
}