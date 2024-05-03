<?php
include("crud/conection.php");
$con = conection();
    $sopa = $_POST['sopa'];
    $carne = $_POST['carne'];
    $ensalada = $_POST['ensalada'];
    $jugo = $_POST['jugo'];
    $adiciones = $_POST['adicion'];
    $mesa = $_POST['mesa'];
    $estado ='Pendiente';

    $sql = mysqli_query($con,"INSERT INTO pedido (sopa,carne,ensalada,jugo,adiciones,direccion,estado) VALUES ('$sopa','$carne','$ensalada','$jugo','$adiciones','$mesa','$estado')") or die ($con. "El registro falló");

    if($sql){
        Header("Location: ./");
    }else{
    
    }
?>