<?php require '../../includes/_db.php' ?>
<?php require '../../includes/_header.php' ?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
      .problema{
        background-color: <?php echo $color?>;
        color: #000000;
    }
  </style>
</head>
<body>
  <div id= "content">
    <section>
      <div class="container mt-5">
        <div class="row">
          <div class="col-sm-12 mb-3">
            <center><h1>Platos</h1></center>
            <a href="plato_agregar.php"><input  class="btn btn-primary" type="button" value="Agregar plato"></a>
          </div>
          <div class="col-sm-12">
            <div class="table-responsive">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                  <th>Codigo</th>
                  <th>Nombre</th>
                  <th>Descripcion</th>
                  <th>Precio</th>
                  <th>Descuento</th>
                  <th>Imagen</th>
                  <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  $sql = "SELECT * FROM producto";
                  $productos = mysqli_query($conexion, $sql);
                  if($productos -> num_rows > 0){
                    foreach($productos as $key => $row ){
                    ?>
                    <!--funcion y estilos para celdas en error-->
                    <?php

                  if ($row['cantidad'] <= $row['cantidad_minima']) {
                    $color = '#F78E8E';
                    $clase = 'problema';
                  } else {
                    $clase = 'correcto';
                  }
                  // ...

                  ?>

                  <!-- empieza la tabla-->
                  <tr>
                  <td> <?php echo $row['codigo_prod']; ?></td>
                  <td><?php echo $row['nombre_producto']; ?></td>
                  <td><?php echo $row['descripcion']; ?></td>
                  <td><?php echo $row['precio']; ?>$</td>
                  <td><?php echo $row['descuento']; ?></td>
                  <td><img width="100" src="data:image;base64,<?php echo base64_encode($row['imagen']);  ?>" ></td>
                  <td>
                    <a href="plato_editar.php?codigo_prod=<?php echo $row['codigo_prod']?>" class='users-table--edit'>
                      <div">
                        Editar
                      </div>
                    </a>
                    <br><br>
                    <a href="plato_eliminar.php?codigo_prod=<?php echo $row['codigo_prod']?>" class='users-table--delete' >
                      <div">
                      Eliminar
                      </div>
                    </a>
                  </td>
                  </tr>


                  <?php
                  }
                  }else{

                  ?>
                    <tr class="text-center">
                    <td colspan="4">No existe registros</td>
                    </tr>

                  <?php
                  }?>
                </tbody>

              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <?php require '../../includes/_footer.php' ?>
</body>
</html>
