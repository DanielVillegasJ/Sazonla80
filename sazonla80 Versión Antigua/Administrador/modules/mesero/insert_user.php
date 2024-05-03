<?php
include("conection.php");

$con = conection();

    $documento = $_POST['documento_usuario'];
    $nombre = $_POST['nombre_usuario'];
    $email = $_POST['email'];
    $direccion = $_POST['direccion'];
    $f_nacimiento = $_POST['fecha_nacimiento'];
    $salario = $_POST['salario'];
    $telefono = $_POST['telefono'];
    $contraseña = $_POST['contraseña'];
    $foto = addslashes(file_get_contents($_FILES['foto']['tmp_name']));
    $rol = $_POST['rol'];
    $encript =md5($contraseña);

    $sql = mysqli_query($con,"INSERT INTO usuario (documento_usuario,nombre_usuario,email,direccion,fecha_nacimiento,salario,telefono,contraseña,foto,rol) VALUES ('$documento','$nombre','$email','$direccion','$f_nacimiento',$salario,$telefono,'$encript','$foto','$rol')") or die ($con. "El registro falló");

    if($sql){
        Header("Location: ./");
    }
?>