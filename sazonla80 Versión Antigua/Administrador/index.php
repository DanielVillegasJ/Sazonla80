<?php
session_start();
include("settings/conexion.php");
$connect = conexion();

// Verifica si el usuario ha iniciado sesión
if (isset($_SESSION['documento_administrador'])) {
    $documento_usuario = $_SESSION['documento_administrador'];

    // Utiliza el documento del usuario de la sesión para obtener sus datos
    $sql = "SELECT * FROM administrador WHERE documento_administrador = '$documento_usuario'";
    $query = mysqli_query($connect, $sql);

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
                    <h1>Administrador</h1>
                    <ul>
                        <li><a href="index.php">Inicio</a></li>
                        <li><a href="modules/mesero/index.php">Gestion de Empleados</a></li>
                        <li><a href="modules/inventario/index.php">Inventario</a></li>
                    </ul> 
                </div>
            </div>
        </div>

            <div class="logo">
                <img src="img/logo.png" alt="LOGO">
            </div>

        <div class="user-menu">
            <div class="dropdown">
                <img alt="foto" class="dropbtn" onclick="toggleDropdown()" src="img/Configuracion.png"></img>
                <div id="dropdown-content" class="dropdown-content">
                    <a href="settings/settings.php">Configuración</a>
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

    <main>
        <div class="resu_estadi">
            <h1 class="caja_resul">Resumen de Estadísticas</h1>
            <h3 class="h3_caja_resul">Compras Totales <span class="texto_der">**********</span></h3>
            <br>
            <h3 class="h3_caja_resul">Compras a Domicilio <span class="texto_der">**********</span></h3>
            <br>
            <h3 class="h3_caja_resul">Clientes Totales <span class="texto_der">**********</span></h3>
            <br>
            <h3 class="h3_caja_resul">Recaudo Total <span class="texto_der">**********</span></h3>
        </div>

        <div class="linea_horizontal"></div>

        <div class="resu_estadi" id="resu_2">
            <h1 class="caja_resul">Horario de Actividades</h1>
            <h3 class="h3_caja_resul">Desayuno (8:00 - 11:00):</h3>
            <h4 class="h3_caja_resul">Servicio de desayuno completo.</h4>
            <h4 class="h3_caja_resul">Variedad de opciones de café, té u jugos.</h4>
            <h4 class="h3_caja_resul">Selección de panes y pasteles recien horneados.</h4>
            <br>
            <h3 class="h3_caja_resul">Almuerzo (12:00 - 16:00):</h3>
            <h4 class="h3_caja_resul">Menú del día con opciones de platos principales.</h4>
            <h4 class="h3_caja_resul">Bebidas refrescantes</h4>
        </div>

        <div class="linea_horizontal"></div>

        <div class="pdf">
            <h1>Informe y Analisis</h1>
            <h4>(INSERTAR PDF)</h4>
        </div>
    </main>

    <script>
        function toggleDropdown() {
            var dropdownContent = document.getElementById("dropdown-content");
            dropdownContent.classList.toggle("show");
        }

        // Cerrar el menú desplegable si el usuario hace clic fuera de él
        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }

        const toggleBtn = document.getElementById("toggleBtn");
        const sidebar = document.getElementById("mySidebar");

        toggleBtn.addEventListener("click", function() {
        sidebar.classList.toggle("active");
        toggleBtn.classList.toggle("active");
        });
    </script>
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
