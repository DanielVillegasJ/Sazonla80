<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
    <div class="container mt-5">
    <div class="row">
    <div class="col-sm-6 offset-sm-3">
    <div class="alert alert-danger text-center">
    <p>¿Desea confirmar la eliminacion del registro?</p>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <form action="../../includes2/_functions.php" method="POST">
            <input type="hidden" name="accion" value="eliminar_plato">
            <input type="hidden" name="codigo_prod" value="<?php echo $_GET['codigo_prod']; ?>">
            <input type="submit" name="" value="Eliminar" class="btn btn-success">
            <a href="./" class="btn btn-danger">Cancelar</a>
        </div>
    </div>

    
</body>
    </html>