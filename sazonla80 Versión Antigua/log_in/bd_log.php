<?php    
if(isset($_POST["btn_log"])){
    include "conexion.php";
    session_start();
    $rol=$_POST['rol'];
    if($rol == 'domiciliario'){
            $documento = $_POST["documento"];
            $clave = $_POST["password"];
            
            $encript =md5($clave);
            
            $consulta = mysqli_query($conexion, "SELECT * FROM usuario WHERE documento_usuario = '$documento' AND contraseña = '$encript'") or die ($conexion. "error en el ingreso");

            $resultado = mysqli_num_rows($consulta);

        if ($resultado != 0){
            while($row = mysqli_fetch_assoc($consulta)){
                $dbdocumento=$row['documento_usuario'];
                $dbpassword=$row['contraseña'];

                if($documento == $dbdocumento && $encript == $dbpassword){
                    $_SESSION['documento_usuario'] = $documento;
                
                    echo "<script>window.location='../Domiciliario/index.php'</script>";

                }
            }
        }else{
            echo "<script>alert('usuario y/o contraseña no encontrado')</script>";
            echo "<script>window.location='./'</script>";
        }
    }else if($rol == 'cliente'){
        $documento = $_POST["documento"];
        $clave = $_POST["password"];
        
        $encript =md5($clave);
        
        $consulta = mysqli_query($conexion, "SELECT * FROM usuario WHERE documento_usuario = '$documento' AND contraseña = '$encript'") or die ($conexion. "error en el ingreso");

        $resultado = mysqli_num_rows($consulta);

        if ($resultado != 0){
            while($row = mysqli_fetch_assoc($consulta)){
                $dbdocumento=$row['documento_usuario'];
                $dbpassword=$row['contraseña'];

                if($documento == $dbdocumento && $encript == $dbpassword){
                    $_SESSION['documento_usuario'] = $documento;

                    echo "<script>window.location='../Cliente/index.php'</script>";

                }
            }
        }else{
            echo "<script>alert('usuario y/o contraseña no encontrado')</script>";
            echo "<script>window.location='./'</script>";
        }
    }else if($rol == 'mesero'){
        $documento = $_POST["documento"];
        $clave = $_POST["password"];
        
        $encript =md5($clave);
        
        $consulta = mysqli_query($conexion, "SELECT * FROM usuario WHERE documento_usuario = '$documento' AND contraseña = '$encript'") or die ($conexion. "error en el ingreso");

        $resultado = mysqli_num_rows($consulta);

        if ($resultado != 0){
            while($row = mysqli_fetch_assoc($consulta)){
                $dbdocumento=$row['documento_usuario'];
                $dbpassword=$row['contraseña'];

                if($documento == $dbdocumento && $encript == $dbpassword){
                    $_SESSION['documento_usuario'] = $documento;
                
                    echo "<script>window.location='../Mesero/index.php'</script>";

                }
            }
        }else{
            echo "<script>alert('usuario y/o contraseña no encontrado')</script>";
            echo "<script>window.location='./'</script>";
        }
    }else if($rol == 'administrador'){
        $documento = $_POST["documento"];
        $clave = $_POST["password"];
        
        $encript =md5($clave);
        
        $consulta = mysqli_query($conexion, "SELECT * FROM administrador WHERE documento_administrador = '$documento' AND contraseña = '$encript'") or die ($conexion. "error en el ingreso");

        $resultado = mysqli_num_rows($consulta);

        if ($resultado == 1){
            while($row = mysqli_fetch_assoc($consulta)){
                $dbdocumento=$row['documento_administrador'];
                $dbpassword=$row['contraseña'];

                if($documento == $dbdocumento && $encript == $dbpassword){
                    $_SESSION['documento_administrador'] = $documento;

                    echo "<script>window.location='../Administrador/index.php'</script>";

                }
            }
        }else{
            echo "<script>alert('usuario y/o contraseña no encontrado')</script>";
            echo "<script>window.location='./'</script>";
        }
    }else if($rol == 'cocinero'){
        $documento = $_POST["documento"];
        $clave = $_POST["password"];
        
        $encript =md5($clave);
        
        $consulta = mysqli_query($conexion, "SELECT * FROM usuario WHERE documento_usuario = '$documento' AND contraseña = '$encript'") or die ($conexion. "error en el ingreso");

        $resultado = mysqli_num_rows($consulta);

        if ($resultado != 0){
            while($row = mysqli_fetch_assoc($consulta)){
                $dbdocumento=$row['documento_usuario'];
                $dbpassword=$row['contraseña'];

                if($documento == $dbdocumento && $encript == $dbpassword){
                    $_SESSION['documento_usuario'] = $documento;
                
                    echo "<script>window.location='../Cocinero/index.php'</script>";

                }
            }
        }else{
            echo "<script>alert('usuario y/o contraseña no encontrado')</script>";
            echo "<script>window.location='./'</script>";
        }
    }
}


?>