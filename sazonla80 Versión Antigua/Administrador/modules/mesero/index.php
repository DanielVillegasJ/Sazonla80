<?php
session_start();
include("conection.php");
$connect = conection();

// Verifica si el usuario ha iniciado sesión
if (isset($_SESSION['documento_administrador'])) {
    $documento_usuario = $_SESSION['documento_administrador'];

    // Utiliza el documento del usuario de la sesión para obtener sus datos
    $sql = "SELECT * FROM administrador WHERE documento_administrador = '$documento_usuario'";
    $query = mysqli_query($connect, $sql);

    
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sazonla80";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

$rolSeleccionado = isset($_GET['rol']) ? $_GET['rol'] : 'todos';

if ($rolSeleccionado == 'todos') {
    $sql = "SELECT * FROM usuario";
} else {
    $rolSeleccionado = $conn->real_escape_string($rolSeleccionado);
    $sql = "SELECT * FROM usuario WHERE rol = '$rolSeleccionado'";
}

$result = $conn->query($sql);

if ($row = mysqli_fetch_array($query)) {
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/styles.css" rel="stylesheet">
    <link rel="icon" href="img/logo.png">
    <title>Administrador</title>
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
                        <li><a href="../../index.php">Inicio</a></li>
                        <li><a href="../mesero/index.php">Gestion de Empleados
                        <li><a href="../inventario/index.php">Inventario</a></li>
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
                    <a href="../../settings/settings.php">Configuración</a>
                    <a href="../../../log_in/salir.php">Cerrar Sesión</a>
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

    <div class="content">
        <div class="users-form">
            <form action="insert_user.php" method="POST" enctype="multipart/form-data">
                <input class="input" type="text" name="documento_usuario" placeholder="Documento">
                <input class="input" type="file" name="foto" placeholder="Foto">
                <input class="input" type="text" name="nombre_usuario" placeholder="Nombre">
                <input class="input" type="password" name="contraseña" placeholder="Contraseña">
                <input class="input" type="date" name="fecha_nacimiento" placeholder="Fecha Nacimiento">
                <input class="input" type="email" name="email" placeholder="Email">
                <input class="input" type="text" name="direccion" placeholder="Dirección">
                <input class="input" type="number" name="telefono" placeholder="Telefono">
                <input class="input" type="number" name="salario" placeholder="Salario">
                <select class="input" name="rol" id="rol">
                    <option value="cocinero">Cocinero</option>
                    <option value="mesero">Mesero</option>
                    <option value="domiciliario">Domiciliario</option>
                </select>
                <input class="input" type="submit" value="Enviar">
            </form>
        </div>

        <div class="users-table">
            <br>
            <center><h2>Usuarios Registrados</h2></center>
            <br>
            <table>
                <thead>
                    <tr>
                        <th>Documento</th>
                        <th>Foto</th>
                        <th>Nombre</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Email</th>
                        <th>Dirección</th>
                        <th>Telefono</th>
                        <th>Rol</th>
                        <th>Salario</th>
                        <th>
                        <select id="filtro-rol" name="rol" onchange="filtrarPorRol()">
                            <option   option value="todos" <?php if ($rolSeleccionado === 'todos') echo 'selected'; ?>>Todos</option>
                            <option value="cocinero" <?php if ($rolSeleccionado === 'cocinero') echo 'selected'; ?>>Cocinero</option>
                            <option value="mesero" <?php if ($rolSeleccionado === 'mesero') echo 'selected'; ?>>Mesero</option>
                            <option value="domiciliario" <?php if ($rolSeleccionado === 'domiciliario') echo 'selected'; ?>>Domiciliario</option>
                        </select>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if ($result->num_rows > 0) {
                            // Muestra los resultados en la tabla HTML
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td><center>" . $row['documento_usuario'] . "</center></td>"; 
                                echo "<td><center><img class='table_img' src='data:image/jpeg;base64," . base64_encode($row['foto']) . "' style='max-width: 150px; max-height: 150px;'></center></td>";
                                echo "<td><center>" . $row['nombre_usuario'] . "</center></td>";
                                echo "<td><center>" . $row['fecha_nacimiento'] . "</center></td>";
                                echo "<td><center>" . $row['email' ] . "</center></td>";
                                echo "<td><center>" . $row['direccion'] . "</center></td>";
                                echo "<td><center>" . $row['telefono'] . "</center></td>";
                                echo "<td><center>" . $row['rol'] . "</center></td>";
                                echo "<td><center>" . $row['salario'] . "</center></td>";
                                echo "<td class='button-container'>";
                                echo "<a href='update.php?documento_usuario= ".  $row['documento_usuario'] ."'class='users-table--edit'>Editar</a>";
                                echo "      ";
                                echo "<a href='delete_user.php?documento_usuario= ".  $row['documento_usuario'] ."'class='users-table--delete'>Eliminar</a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        }
                        $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
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

        function filtrarPorRol() {
            const rolSeleccionado = document.getElementById("filtro-rol").value;

            // Redirecciona a la misma página con el rol seleccionado como parámetro
            window.location.href = 'index.php?rol=' + rolSeleccionado;
        }
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