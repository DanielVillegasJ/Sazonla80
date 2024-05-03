<?php

require_once ("_db.php");


if(isset($_POST['accion'])){ 
    switch($_POST['accion']){

        case 'eliminar_insumo':
          eliminar_insumo();

        break;

        case 'editar_insumo':
          editar_insumo();

        break;

        case 'insertar_insumo':
          insertar_insumo();

        break;
        
        case 'eliminar_plato':
          eliminar_plato();

        break;

        case 'editar_plato':
          editar_plato();

        break;

        case 'insertar_plato':
          insertar_plato();

        break;

        case 'eliminar_categoria':
          eliminar_categoria();

        break;

        case 'editar_categoria':
          editar_categoria();
        
        break;

        case 'insertar_categoria':
          insertar_categoria();

        break;
    }

}

function insertar_insumo(){

    global $conexion;
    extract($_POST);


        //variables donde se almacenan los valores de nuestra imagen
                $tamanoArchvio=$_FILES['foto']['size'];
    
        //se realiza la lectura de la imagen
                $imagenSubida=fopen($_FILES['foto']['tmp_name'], 'r');
                $binariosImagen=fread($imagenSubida,$tamanoArchvio);   
        //se realiza la consulta correspondiente para guardar los datos
        
        $imagenFin =mysqli_escape_string($conexion,$binariosImagen);

    $consulta="INSERT INTO insumo(nombre, descripcion, precio, cantidad, cantidad_minima, categorias, fecha_vencimiento, imagen)
    VALUES ('$nombre', '$descripcion', $precio, $cantidad ,$cantidad_minima, '$categorias', '$f_vencimiento', '$imagenFin');" ;

    mysqli_query($conexion, $consulta);
    
    header("Location: ../views/usuarios/");

}
function editar_insumo(){

    global $conexion;
    extract($_POST);

        //variables donde se almacenan los valores de nuestra imagen
                $tamanoArchvio=$_FILES['foto']['size'];
        //se realiza la lectura de la imagen
                $imagenSubida=fopen($_FILES['foto']['tmp_name'], 'r');
                $binariosImagen=fread($imagenSubida,$tamanoArchvio);   
        //se realiza la consulta correspondiente para guardar los datos
        
        $imagenFin =mysqli_escape_string($conexion,$binariosImagen);
                
    $consulta="UPDATE insumo SET nombre = '$nombre', descripcion = '$descripcion', precio = '$precio', cantidad = '$cantidad', categorias = '$categorias', fecha_vencimiento = '$f_vencimiento', imagen = '$imagenFin' WHERE id = $id";

    mysqli_query($conexion, $consulta);
    header("Location: ../views/usuarios/");
}
function eliminar_insumo(){

    global $conexion;
    extract($_POST);
    $id = $_POST['id'];
    $consulta = "DELETE FROM insumo WHERE id = $id";
    mysqli_query($conexion, $consulta);
    header("Location: ../views/usuarios/");
}

function insertar_plato(){

  global $conexion;
    extract($_POST);


        //variables donde se almacenan los valores de nuestra imagen
                $tamanoArchvio=$_FILES['foto']['size'];
    
        //se realiza la lectura de la imagen
                $imagenSubida=fopen($_FILES['foto']['tmp_name'], 'r');
                $binariosImagen=fread($imagenSubida,$tamanoArchvio);   
        //se realiza la consulta correspondiente para guardar los datos
        
        $imagenFin =mysqli_escape_string($conexion,$binariosImagen);

    $consulta="INSERT INTO producto(nombre_producto, descripcion, precio, descuento, imagen, tipo_producto)
    VALUES ('$nombre', '$descripcion', $precio, $descuento , '$imagenFin', '$tipo_producto');" ;

    mysqli_query($conexion, $consulta);
    
    header("Location: ../views/usuarios/platos.php");
}
function editar_plato(){

  global $conexion;
    extract($_POST);
    $id = $_POST['codigo_prod'];
                
    $consulta="UPDATE producto SET nombre_producto = '$nombre', descripcion = '$descripcion', precio = '$precio' WHERE codigo_prod = $id";

    mysqli_query($conexion, $consulta);
    header("Location: ../views/usuarios/platos.php");
}
function eliminar_plato(){

  global $conexion;
    extract($_POST);
    $id = $_POST['codigo_prod'];
    $consulta = "DELETE FROM producto WHERE codigo_prod = $id";
    mysqli_query($conexion, $consulta);
    header("Location: ../views/usuarios/platos.php");
}

function insertar_categoria(){

  global $conexion;
  extract($_POST);

  $consulta="INSERT INTO categoria(nombre_categoria, color_categoria)
  VALUES ('$nombre_categoria', '$color');" ;

  mysqli_query($conexion, $consulta);
  
  header("Location: ../views/usuarios/categorias.php");
}

function editar_categoria(){

  global $conexion;
    extract($_POST);
    $id = $_POST['id_categoria'];
                
    $consulta="UPDATE categoria SET nombre_categoria = '$nombre_categoria', color_categoria = '$color' WHERE id_categoria = $id";

    mysqli_query($conexion, $consulta);
    header("Location: ../views/usuarios/categorias.php");
}

function eliminar_categoria(){

  global $conexion;
    extract($_POST);
    $id = $_POST['id_categoria'];
    $consulta = "DELETE FROM categoria WHERE id_categoria = $id";
    mysqli_query($conexion, $consulta);
    header("Location: ../views/usuarios/categorias.php");
}
?>