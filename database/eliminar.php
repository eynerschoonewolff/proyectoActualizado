<?php
    include_once "../database/conexion.php";

    $correo_electronico=$_GET['correo'];

    $sentencia=$bd->prepare("DELETE FROM usuarios WHERE correo=?;");
    $resul=$sentencia->execute([$correo_electronico]);

    if($resul===TRUE){
        header('location: ../html/inicioAdmin.php?mensaje=eliminado');
        
    }else{
        echo "error";
    }

?>