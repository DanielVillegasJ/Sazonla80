<?php
    include "conexion.php";
    if(isset($_POST["btn_regis"])){ 
        $pass1 = $_POST["clave1"];
        $pass2 = $_POST["clave2"];
        if($pass1 == $pass2){ 
                $usuario = $_POST["usuario"];
                $documento = $_POST["documento"];
                $correo = $_POST["correo"];
                $direccion= $_POST["direccion"];
                $fecha_nac= $_POST["fecha_nac"];
                $telefono= $_POST["telefono"];
                $rol= 'cliente';

                $encript=md5($pass1);
                
                $registro = mysqli_query($conexion,"INSERT INTO usuario (documento_usuario,nombre_usuario,email,direccion,fecha_nacimiento,telefono,contraseña,rol) VALUES ('$documento','$usuario','$correo','$direccion','$fecha_nac',$telefono,'$encript','$rol')") or die ($conexion."el registro fallo");

                echo "<script>alert('registro exitoso')</script>";
                echo "<script>window.location='index.html'</script>";
            }
    }
?>