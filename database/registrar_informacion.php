<?php
include "../database/conexion.php";

$correo = $_POST['correo'];
$contraseña = $_POST['contraseña'];
$tipo_usu = $_POST['tipoUsuario'];
$fecha_registro = $_POST['fechaRegistro'];

//informacion de usuario estudiante
$nombre_Est = $_POST['nombresEstudiantes'];
$apellido_Est = $_POST['apellidosEstudiante'];
$identificacion = $_POST['id'];
$fecha_nacimiento = $_POST['fechaNacimiento'];
$grado = $_POST['grado'];

//informacion de usuario pscicologo
$nombre_Pscicologo = $_POST['nombrespscicologo'];
$apellidos_pscicologo = $_POST['apellidos'];
$identificacion_pscicologo = $_POST['idpscicologo'];


$sql = $bd->prepare("SELECT count(correo) existe FROM usuarios WHERE correo=?;" );
$sql->execute([$correo]);
$correo_vali = $sql->fetch(PDO::FETCH_OBJ);

if( $correo_vali->existe >0 ){
    header('location: ../html/inicioAdmin.php?mensaje=errorCorreo');
    exit();
}

$sql2 = $bd->prepare("INSERT INTO usuarios(correo,contraseña,tip_user,fech_reg) VALUES (?, ?, ?, ?);");
$resultado = $sql2->execute([$correo, $contraseña, $tipo_usu, date('Y-m-d')]);


if ($nombre_Est != "" && $apellido_Est != "" && $identificacion != "" && $fecha_nacimiento != "" && $grado != "") {
    $insert = "INSERT INTO estudiante(nombres,apellidos,identificacion,fecha_nacimiento,correo,codigo_curso) 
    VALUES (:nombres, :apellidos, :identificacion, :fecha_nacimiento, :correo,:codigo_curso);";
    $sqlEstudiante = $bd->prepare($insert);
    $resultado2 = $sqlEstudiante->execute([
        "nombres" => $nombre_Est,
        "apellidos" => $apellido_Est,
        "identificacion" => $identificacion,
        "fecha_nacimiento" => $fecha_nacimiento,
        "correo" => $correo,
        "codigo_curso" => $grado
    ]);
}


if ($nombre_Pscicologo != "" && $apellidos_pscicologo != "" && $identificacion_pscicologo != "") {
    $sqlPscicologo = $bd->prepare("INSERT INTO psicologo(nombres,apellidos,identificacion,correo) VALUES (?,?,?,?);");
    $resultado3 = $sqlPscicologo->execute([$nombre_Pscicologo, $apellidos_pscicologo, $identificacion_pscicologo, $correo]);
}

if ($resultado === TRUE) {
    header('location: ../html/inicioAdmin.php?mensaje=EnviadoCorrectamente');
} else {
    header('location: ../html/inicioAdmin.php?mensaje=error');
    exit();
}
