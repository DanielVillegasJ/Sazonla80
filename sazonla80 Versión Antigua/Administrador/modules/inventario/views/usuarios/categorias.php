<?php
session_start();
include("../crud/conection.php");
$con = conection();

if (isset($_SESSION['documento_usuario'])) {
    $documento_usuario = $_SESSION['documento_usuario'];
    // Utiliza el documento del usuario de la sesión para obtener sus datos
    $sql = "SELECT * FROM usuario WHERE documento_usuario = '$documento_usuario'";
    $query = mysqli_query($con, $sql);

    $sqlp = "SELECT * FROM categoria";
    $queryp = mysqli_query($con, $sqlp);

    if ($row = mysqli_fetch_array($query)) {
?>

<?php require '../../includes/_db.php' ?>
<?php require '../../includes/_header.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="row">
        <a href="">Agregar Categoría</a>
        <a href="">Editar Categoría</a>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <a class="catfresco" href="insumosCategoria.php?categorias=<?php echo 'Alimentos Frescos'?>">
            Alimentos Frescos
            </a>
        </div>
        <div class="col-sm-4">
            <a class="catseco" href="insumosCategoria.php?categorias=<?php echo 'Alimentos Secos'?>">
            Alimentos Secos
            </a>
        </div>  
        <div class="col-sm-4">
            <a class="catpanaderia" href="insumosCategoria.php?categorias=<?php echo 'Productos de Panadería'?>">
            Productos de Panadería
            </a>
        </div>  
    </div>
    <div class="row">
        <div class="col-sm-4">
            <a class="catenlatado" href="insumosCategoria.php?categorias=<?php echo 'Ingredientes Enlatados y Empaquetados'?>">
            Ingredientes Enlatados y Empaquetados
            </a>
        </div>
        <div class="col-sm-4">
            <a class="catproteina" href="insumosCategoria.php?categorias=<?php echo 'Carne y Proteínas'?>">
            Carne y Proteínas
            </a>
        </div>
        <div class="col-sm-4">
            <a class="catcongelado" href="insumosCategoria.php?categorias=<?php echo 'Productos Congelados'?>">
            Productos Congelados
            </a>
        </div>
    </div>
    <div class="row"> 
        <div class="col-sm-4">
            <a class="catbebida" href="insumosCategoria.php?categorias=<?php echo 'Bebidas y Licores'?>">
            Bebidas y Licores
            </a>
        </div>
        <div class="col-sm-4">
            <a class="catdesechable" href="insumosCategoria.php?categorias=<?php echo 'Suministros Desechables'?>">
            Suministros desechables
            </a>
        </div>
        <div class="col-sm-4">
            <a class="cathigiene" href="insumosCategoria.php?categorias=<?php echo 'Productos de Limpieza e higiene'?>">
            Productos de limpieza e higiene
            </a>
        </div>
    </div>
    <div class="row"> 
        <div class="col-sm-4">
            <a class="catbutensilios" href="insumosCategoria.php?categorias=<?php echo 'Utensilios de Cocina y Equipo'?>">
            Utensilios de Cocina y Equipo
            </a>
        </div>
        <div class="col-sm-4">
            <a class="catnoalimentario" href="insumosCategoria.php?categorias=<?php echo 'Productos no Alimentarios'?>">
            Productos no Alimentarios
            </a>
        </div>
    </div>
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