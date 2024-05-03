<?php
session_start();
include("crud/conection.php");
$con = conection();

// Verifica si el usuario ha iniciado sesión
if (isset($_SESSION['documento_usuario'])) {
    $documento_usuario = $_SESSION['documento_usuario'];
    // Utiliza el documento del usuario de la sesión para obtener sus datos
    $sql = "SELECT * FROM usuario WHERE documento_usuario = '$documento_usuario'";
    $query = mysqli_query($con, $sql);

    if ($row = mysqli_fetch_array($query)) {
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" href="img/logo.png">
    <title>Sazón la 80</title>
</head>
<body>
    <div class="topbar">
        
        <div class="side">
            <button id="toggleBtn"><img src="img/hamburguesa.png" alt=""></button>

            <div id="mySidebar" class="sidebar">
                <div class="sidebar-content">
                    <div class="logo">
                        <img src="img/logo.png" alt="Restaurante Logo">
                    </div>
                    <h1>Mesero</h1>
                    <ul>
                        <li><a href="index.php">Pedir</a></li>
                        <li><a href="modules/pedidos.php">Pedidos</a></li>
                        <li><a href="modules/entregados.php">Entregados</a></li>
                    </ul> 
                </div>
            </div>
        </div>

            <div class="logo">
                <img src="img/logo.png" alt="LOGO">
            </div>

        <div class="user-menu">
            <div class="dropdown">
                <img src="img/Configuracion.png" alt="foto" class="dropbtn" onclick="toggleDropdown()">
                <div id="dropdown-content" class="dropdown-content">
                    <a href="../log_in/salir.php">Cerrar Sesión</a>
                </div>
            </div>
            <!-- <div class="user-profile">
                <span>Nombre de Usuario</span>
                <div class="user-options">
                    <ul>
                        <li><a href="settings/settings.html">Configuración</a></li>
                        <li><a href="#">Cerrar Sesión</a></li>
                    </ul>
                </div>
            </div> -->
        <!-- </div>
            <button onclick="">☰</button>
                <div class="logo">
                    <img src="img/logo.png" alt="Restaurante Logo">
                </div>
                <h1>Administrador</h1>
                <ul>
                    <li><a href="#">Menú</a></li>
                    <li><a href="#">Insumos</a></li>
                    <li><a href="#">Cliente</a></li>
                    <li><a href="#">Mesero</a></li>
                    <li><a href="#">Cocinero</a></li>
                    <li><a href="#">Domiciliario</a></li>
                </ul> -->
        </div>
    </div>

    <div class="users-form">
        <form action="insertar_pedidos.php" method="POST">
            
            <input class="input" type="text" name="sopa" placeholder="Sopa">
            <input class="input" type="text" name="carne" placeholder="Carne">
            <input class="input" type="text" name="ensalada" placeholder="Ensalada">
            <input class="input" type="text" name="jugo" placeholder="Jugo">
            <input class="input" type="text" name="adicion" placeholder="Adiciones">
            <input class="input" type="text" name="mesa" placeholder="Mesa">
            <input class="input" type="submit" value="Enviar">
        </form>
    </div>

    <script src="js/script.js"></script>
</body>
</html>
<?php 
} else {
    echo "Usuario no encontrado.";
}
} else {
echo "El usuario no ha iniciado sesión.";
}
?>  