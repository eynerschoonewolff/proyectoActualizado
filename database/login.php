<?php
include "../database/con_db.php";
$bd = new bd();

$usuario = trim($_POST['email']);
$contra = trim($_POST['passw']);
$contra= md5($contra);

$consulta = "SELECT * FROM usuarios WHERE correo = '$usuario' and contraseña = '$contra';";
$usuario = $bd->query($consulta);



if(!empty($usuario)){
    header("location: ../html/inicioEstudiante.html");
}else{    
    echo "<script> alert('Usuario o contraseña incorrecto.');window.location= '../html/login.html' </script>";
}
