<!DOCTYPE html>
<html lang="es">
<?php require '../../includes/_db.php' ?>

<?php require '../../includes/_header.php' ?>
<body>

<div class="container">
<div class="col-sm-6 offset-3 mt-5">
<form action="../../includes/_functions.php" method="POST"  enctype="multipart/form-data">

<div class="row">
    <div class="col-sm-6">
<div class="mb-3">
<label for="nombre_categoria" class="form-label">Nombre *</label>
<input type="text"  id="nombre_categoria" name="nombre_categoria" class="form-control" required>
</div>
</div>

<div class="col-sm-6">
<div class="mb-3">
<label for="descripcion" class="form-label">Descripcion *</label>
<input type="text"  id="descripcion" name="descripcion" class="form-control" required >
</div>
</div>
</div>