<?php 
    session_start();
    include("conexion.php");
    $con=conexion();

    $id=$_GET['documento_usuario'];

    $sql="SELECT * FROM usuario WHERE documento_usuario='$id'";
    $query=mysqli_query($con, $sql);

    $row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/estilos.css" rel="stylesheet">
        <title>Sazón la 80</title>
        
    </head>
    <body>
        <div class="users-form">
            <form action="edit_user.php" method="POST" enctype="multipart/form-data">

                <input class="input" type="text" REQUIRED name="documento" placeholder="Documento"  value="<?= $row['documento_usuario']?>">
                <!-- <img height="150px" src="data:image/jpeg;base64,<?= base64_encode($row['foto_usuario']) ?>"></img>
                <input class="input" type="file" REQUIRED name="foto"> -->
                <input class="input" type="text" name="nombre" placeholder="Nombre" value="<?= $row['nombre_usuario']?>">
                <input class="input" type="password" name="contraseña" placeholder="Contraseña" value="<?= $row['contraseña']?>">
                <input class="input" type="date" name="fecha_nacimiento" placeholder="Fecha Nacimiento" value="<?= $row['fecha_nacimiento']?>">
                <input class="input" type="email" name="email" placeholder="Email" value="<?= $row['email']?>">
                <input class="input" type="text" name="direccion" placeholder="Dirección" value="<?= $row['direccion']?>">
                <input class="input" type="number" name="telefono" placeholder="Telefono" value="<?= $row['telefono']?>">

                <input type="submit" value="Actualizar">
            </form>
        </div>
    </body>
</html>