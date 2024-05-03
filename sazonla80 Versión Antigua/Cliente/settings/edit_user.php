<?php

include("conexion.php");
$con = conexion();

$documento = $_POST['documento'];
$nombre = $_POST['nombre'];
$contraseña = $_POST['contraseña'];
$f_nacimiento = $_POST['fecha_nacimiento'];
$email = $_POST['email'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$encript =md5($contraseña);

// Verificar si se ha cargado una nueva imagen
if ($_FILES['foto']['tmp_name'] != '') {
    echo "New image uploaded successfully.<br>";
    var_dump($_FILES['foto']); // Verificar la información del archivo
    $foto = addslashes(file_get_contents($_FILES['foto']['tmp_name']));
    // Actualizar la imagen en la base de datos
    $sql = "UPDATE usuario SET foto_usuario='$foto', nombre_usuario='$nombre', contraseña='$encript', fecha_nacimiento='$f_nacimiento', email='$email', direccion='$direccion', telefono='$telefono' WHERE documento_usuario='$documento'";
    
} else {
    // No se proporcionó una nueva imagen, actualizar los demás campos
    $sql = "UPDATE usuario SET nombre_usuario='$nombre', contraseña='$encript', fecha_nacimiento='$f_nacimiento', email='$email', direccion='$direccion', telefono='$telefono' WHERE documento_usuario='$documento'";
}

$query = mysqli_query($con, $sql);

if ($query) {
    Header("Location: settings.php");
} else {
    echo "Error al ejecutar la consulta: " . mysqli_error($con); // Mostrar mensaje de error de MySQL
}

?>