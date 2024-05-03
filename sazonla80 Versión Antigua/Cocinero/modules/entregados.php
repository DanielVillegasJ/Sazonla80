<?php
session_start();
include("../crud/conection.php");
$con = conection();

if (isset($_SESSION['documento_usuario'])) {
    $documento_usuario = $_SESSION['documento_usuario'];
    // Utiliza el documento del usuario de la sesión para obtener sus datos
    $sql = "SELECT * FROM usuario WHERE documento_usuario = '$documento_usuario'";
    $query = mysqli_query($con, $sql);

    $sqlp = "SELECT * FROM pedido WHERE estado='Entregado'";
    $queryp = mysqli_query($con, $sqlp);

    if ($row = mysqli_fetch_array($query)) {
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="icon" href="../img/logo.png">
    <title>Sazón la 80</title>
</head>
<body>
    <div class="topbar">
        
        <div class="side">
            <button id="toggleBtn"><img src="../img/hamburguesa.png" alt=""></button>

            <div id="mySidebar" class="sidebar">
                <div class="sidebar-content">
                    <div class="logo">
                        <img src="../img/logo.png" alt="Restaurante Logo">
                    </div>
                    <h1>Cocinero</h1>
                    <ul>
                        <li><a href="../index.php">Pedidos</a></li>
                        <li><a href="entregados.php">Entregados</a></li>
                    </ul> 
                </div>
            </div>
        </div>

            <div class="logo">
                <img src="../img/logo.png" alt="LOGO">
            </div>

        <div class="user-menu">
            <div class="dropdown">
                <img src="../img/Configuracion.png" alt="foto" class="dropbtn" onclick="toggleDropdown()">
                <div id="dropdown-content" class="dropdown-content">
                    <a href="../../log_in/salir.php">Cerrar Sesión</a>
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
    
        <div class="container">
        <h1>Entregados</h1>
            <div id="pedidos-container">
            <?php while ($row = mysqli_fetch_array($query)): ?>
                <div class="pedido-card">
                    <h2><?= $row['direccion'] ?></h2>
                    <div class="comida">
                        <div class="info">
                            <h3><?= $row['sopa'] ?></h3>
                            <h3><?= $row['carne'] ?></h3>
                            <h3><?= $row['ensalada'] ?></h3>
                            <h3><?= $row['jugo'] ?></h3>
                            <h3><?= $row['adiciones'] ?></h3>
                        </div>
                    </div>
                    <div class="opciones">
                        <button ><a href="prueba.php?id_pedido=<?php echo $row['id_pedido'] ?>" class="users-table--edit"><?= $row['estado'] ?></a></button>
                    </div>
                </div>
                <?php endwhile ?>
            </div>
        </div>
    <script src="../js/scripts.js"></script>
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