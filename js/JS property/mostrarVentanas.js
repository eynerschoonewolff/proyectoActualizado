const psicologo = 'Pscicologo';
const estudiante = 'Estudiante';
let opciones = document.getElementById("opciones")
let datosinfoEstudiante = document.getElementById("estudiante")
let datosinfoPscicologo = document.getElementById("pscicologo")

opciones.addEventListener("change", validarTipoUsuario)

function validarTipoUsuario() {
    if (opciones.value === psicologo) {
        datosinfoEstudiante.classList.add('d-none');
        datosinfoPscicologo.classList.remove('d-none');
    } else if (opciones.value === estudiante) {
        datosinfoEstudiante.classList.remove('d-none');
        datosinfoPscicologo.classList.add('d-none');
    }
}


(function() {
    validarTipoUsuario();

})();