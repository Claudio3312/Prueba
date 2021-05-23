<?php

include 'abm-productos/funciones.php';

csrf();
if (isset($_POST['submit']) && !hash_equals($_SESSION['csrf'], $_POST['csrf'])) {
  die();
}
?>





<!DOCTYPE html>
<html lang="en">


<head>
<?php 
include ("includes/header.php")
?></head>
<body>

<?php 
include ("includes/navbar.php")
?>	
	
	
<?php 
include ("includes/sidebar.php")
?>				


				<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Crear Producto</h3>
							</div>
							<div class="module-body">
		<!-- ACA COMIENZA EL MODULO -->

		<?php if (isset($_POST['submit'])) {
  $resultado = [
    'error' => false,
    'mensaje' => 'El producto ' . escapar($_POST['nombre']) . ' ha sido agregado con éxito'
  ];

  $config = include 'abm-productos/config.php';

  try {
    $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
    $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

    $alumno = [
      "nombre"   => $_POST['nombre'],
      "talle" => $_POST['talle'],
      "descripcion"    => $_POST['descripcion'],
      "descripcion"     => $_POST['descripcion'],
    ];

    $consultaSQL = "INSERT INTO productos (nombre, talle, descripcion)";
    $consultaSQL .= "values (:" . implode(", :", array_keys($alumno)) . ")";

    $sentencia = $conexion->prepare($consultaSQL);
    $sentencia->execute($alumno);

  } catch(PDOException $error) {
    $resultado['error'] = true;
    $resultado['mensaje'] = $error->getMessage();
  }
}
?>



<?php
if (isset($resultado)) {
  ?>
  <div class="container mt-3">
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-<?= $resultado['error'] ? 'danger' : 'success' ?>" role="alert">
          <?= $resultado['mensaje'] ?>
        </div>
      </div>
    </div>
  </div>
  <?php
}
?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="mt-4">Crea un producto</h2>
      <hr>
      <form method="post">
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" name="nombre" id="nombre" class="form-control">
        </div>
        <div class="form-group">
          <label for="talle">Talle</label>
          <input type="text" name="talle" id="talle" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Descripcion</label>
          <input type="email" name="email" id="email" class="form-control">
        </div>
		
        <div class="form-group">
          <label for="descripcion">Marca</label>
          <input type="text" name="descripcion" id="descripcion" class="form-control">
        </div>
		
        <div class="form-group">
          <input name="csrf" type="hidden" value="<?php echo escapar($_SESSION['csrf']); ?>">
          <input type="submit" name="submit" class="btn btn-primary" value="Enviar">
          <a class="btn btn-primary" href="abm-productos.php">Regresar al inicio</a>
        </div>
      </form>
    </div>
  </div>
</div>


		<!-- ACA TERMINA EL MODULO -->


				
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->
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
</body>