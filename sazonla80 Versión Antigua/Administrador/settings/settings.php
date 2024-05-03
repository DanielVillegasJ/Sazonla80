<?php
session_start();
include("conexion.php");
$connect = conexion();

$sql = "SELECT * FROM administrador";
$query = mysqli_query($connect, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">

    <link rel="icon" href="img/logo.png">
    <title>Configuración de Perfil</title>
</head>
<body>
    
    <nav>
        <div class="topbar">
            <a href="../index.php" id="Salir">Salir</a>
            <div class="logo">
                <img src="img/logo.png" alt="Restaurante Logo">
            </div>
        </div>
    </nav>
    <main>
    <?php
    if($row=mysqli_fetch_array($query)){
    ?>
        <div class="config-container">
            <h1>Configuración de Perfil</h1>

            <section class="profile-section">
                <!-- <div class="profile-photo">
                    <h2>Foto de Perfil</h2>
                    <div class="profile-image">
                        <img height="150px" src="data:image/jpeg;base64,<?= base64_encode($row['foto_administrador']) ?>"></img>
                    </div>
                    <br>
                </div> -->

                <h2>Documento</h2>
                <p><?= $row['documento_administrador']?></p>
                <h2>Nombre:</h2>
                <p><?= $row['nombre_administrador'];?></p>
                <h2>Email:</h2>
                <p><?= $row['email'];?></p>
                <h2>Direccion:</h2>
                <p><?= $row['direccion'];?></p>
                <h2>Telefono:</h2>
                <p><?= $row['telefono'];?></p>
        

                <a href="update.php?documento_administrador=<?php echo $row['documento_administrador'] ?>" class="users-table--edit">Editar</a>

        </div>
    </main>
    <?php    
    }
    ?>
    <script src="js/scripts.js"></script>
    

    <script>
        // Obtén una referencia al botón
        var boton = document.getElementById("save-btn");

        // Agrega un evento de clic al botón
        boton.addEventListener("click", function() {
            // Redirecciona a la página deseada
            window.location.href = "actualizar.php";
        });
    </script>
</body>
</html>                       