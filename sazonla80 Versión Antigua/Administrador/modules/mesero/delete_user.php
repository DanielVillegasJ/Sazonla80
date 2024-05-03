<?php

include("conection.php");
$con = conection();

$id=$_GET["documento_usuario"];

$sql="DELETE FROM usuario WHERE documento_usuario='$id'";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: ./");
}else{

}

?>