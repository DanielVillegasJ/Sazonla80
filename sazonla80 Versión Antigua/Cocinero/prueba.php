<?php
session_start();
include("crud/conection.php");
$con = conection();


if(isset($_GET['id_pedido'])){
    $id = $_GET['id_pedido'];

        $sql = "UPDATE pedido SET estado='Preparado' WHERE id_pedido='$id'";
        $query = mysqli_query($con, $sql);

        if($query) {
            header("Location: index.php");
            exit(); 
        } else {
            echo "Hubo un error en la actualización de la base de datos.";
        }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <button id="comosellame">Actualizar Estado</button>

    <script>
        const miBoton = document.getElementById("comosellame");

        miBoton.addEventListener("click", function() {
            const xhr = new XMLHttpRequest();
            xhr.open("POST", window.location.href + "?id_pedido=<?php echo $id; ?>", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onload = function() {
                if (xhr.status === 200) {
                    window.location.href = "index.php";
                } else {
                    console.error("Hubo un error en la solicitud AJAX.");
                }
            };
            xhr.send("actualizar_pedido=true");
        });
    </script>
</body>
</html>