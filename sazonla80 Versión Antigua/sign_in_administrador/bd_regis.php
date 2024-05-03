<?php
    include "conexion.php";
    if(isset($_POST["btn_regis"])){ 
        $pass1 = $_POST["clave1"];
        $pass2 = $_POST["clave2"];
        if($pass1 == $pass2){ 
                $usuario = $_POST["nombre_administrador"];
                $documento = $_POST["documento_administrador"];
                $correo = $_POST["email"];
                $direccion= $_POST["direccion"];
                $fecha_nac= $_POST["fecha_nacimiento"];
                $telefono= $_POST["telefono"];

                $encript=md5($pass1);
                

                $registro = mysqli_query($conexion,"INSERT INTO administrador (documento_administrador,nombre_administrador,contraseña,fecha_nacimiento,email,direccion,telefono) VALUES ('$documento','$usuario','$encript','$fecha_nac','$correo','$direccion',$telefono)") or die ($conexion."el registro fallo");

                echo "<script>alert('registro exitoso')</script>";
                echo "<script>window.location='index.html'</script>";
            }
    }
?>