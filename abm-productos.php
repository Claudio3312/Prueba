<?php
include 'abm-productos/funciones.php';

csrf();
if (isset($_POST['submit']) && !hash_equals($_SESSION['csrf'], $_POST['csrf'])) {
  die();
}

$error = false;
$config = include 'abm-productos/config.php';

try {
  $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
  $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

  if (isset($_POST['nombre'])) {
    $consultaSQL = "SELECT * FROM productos WHERE nombre LIKE '%" . $_POST['nombre'] . "%'";
  } else {
    $consultaSQL = "SELECT * FROM productos";
  }

  $sentencia = $conexion->prepare($consultaSQL);
  $sentencia->execute();

  $productos = $sentencia->fetchAll();

} catch(PDOException $error) {
  $error= $error->getMessage();
}

$titulo = isset($_POST['nombre']) ? 'Lista de productos (' . $_POST['nombre'] . ')' : 'Lista de productos';
?>

<!DOCTYPE html>
<html lang="en">
<head>

<?php 
include ("includes/header.php")
?>    
</head>
<body>
<?php 

include ("includes/navbar.php")
?>	
	

<?php 
include ("includes/sidebar.php")
?>				

<div class="span9">
					<div class="content">

<!-- <?php include "abm-productos/templates/header.php"; ?> -->

<?php
if ($error) {
  ?>
  <div class="container mt-2">
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-danger" role="alert">
          <?= $error ?>
        </div>
      </div>
    </div>
  </div>
  <?php
}
?>

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <a href="crear.php"  class="btn btn-primary mt-4">Crear producto</a>
      <hr>
      <form method="post" class="form-inline">
        <div class="form-group mr-3">
          <input type="text" id="nombre" name="nombre" placeholder="Buscar por nombre" class="form-control">
        </div>
        <input name="csrf" type="hidden" value="<?php echo escapar($_SESSION['csrf']); ?>">
        <button type="submit" name="submit" class="btn btn-primary">Ver resultados</button>
      </form>
    </div>
  </div>
</div>

 <div class="container-fluid" class= "float-left">
  <div class="row">
    <div class="col-sm-12">
      <h2 class="mt-3"><?= $titulo ?></h2>
      <table class="table" class="container-fluid">
        <thead>
          <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>talle</th>
            <th>descripcion</th>
            <th>marca</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if ($productos && $sentencia->rowCount() > 0) {
            foreach ($productos as $fila) {
              ?>
              <tr>
                <td><?php echo escapar($fila["id"]); ?></td>
                <td><?php echo escapar($fila["nombre"]); ?></td>
                <td><?php echo escapar($fila["talle"]); ?></td>
                <td><?php echo escapar($fila["descripcion"]); ?></td>
                <td><?php echo escapar($fila["marca"]); ?></td>
                <td>
                
                  <a class="btn btn-danger" href="<?= 'abm-productos/borrar.php?id='. escapar($fila["id"]) ?>">🗑️Borrar</a>
                  <a class="btn btn-warning"href="<?= 'abm-productos/editar.php?id=' . escapar($fila["id"]) ?>">✏️Editar</a>
                </td>
              </tr>
              <?php
            }
          }
          ?>
        <tbody>
      </table>
    </div>
  </div>
</div>     
    
    
                
<div class="footer">
        <div class="container">
            <b class="copyright">&copy; Equipo Davinci </b>All rights reserved.
        </div>
    </div>
    <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
    <script src="scripts/flot/jquery.flot.pie.js" type="text/javascript"></script>
    <script src="scripts/common.js" type="text/javascript"></script>


</div>
</div>
</body>
