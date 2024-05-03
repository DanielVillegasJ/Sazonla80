<?php

function conection(){
    $host = "localhost";
    $user = "root";
    $pass = "";
    
    $bd = "sazonla80";

    $connect=mysqli_connect($host, $user, $pass);

    mysqli_select_db($connect, $bd);

    return $connect;

}

?>