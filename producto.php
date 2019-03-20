<?php

require_once 'db.php';
require_once 'configuration.php';

if(!isValidCookie("practicaweb") || !isset($_GET['pr']) || empty($_GET['pr'])) header("Location: index.php");

?>

<!DOCTYPE html>
<html>
	<head>
		<?php include 'head.php'; ?>
	</head>
	<body>

		<?php include 'topbar.php'; ?>

		<div class="container">
			<div class="row">
			<div class="col-md-3">
				<?php printCarruselFotos($_GET['pr']); ?>
			</div>

			<div class="col-md-9">

				<?php $pr = productoAssocArray($_GET['pr']); 

				echo '<h1>'.$pr['titulo'].'</h1>';
				echo '<h5>Marca: '.$pr['marca'].'</h5>';
				echo '<h5>Modelo: '.$pr['modelo'].'</h5>';
				echo '<p>'.$pr['descripcion'].'</p>';
				echo 'En la categoría de '.getLinkFamilia($pr['familia']);

				?>

			</div>
		</div>

		</div>

	</body>
</html>