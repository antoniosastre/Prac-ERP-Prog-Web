<?php

require_once 'db.php';
require_once 'configuration.php';

if(!isValidCookie("practicaweb")) header("Location: index.php");

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
			<div class="col-8">
				<h1>Mis direcciones guardadas</h1>

				<?php printDireccionesUsuario(explode("-and-", $_COOKIE['practicaweb'])[0]); ?>

			</div>

			<div class="col-4">
				<h2>Añadir nueva dirección</h2>
				<form action="direcciones-engine.php" method="POST">

					<div class="form-group">
						<label for="nombre">Nombre completo</label>
						<input type="text" id="nombre" name="nombre" class="form-control">
					</div>
					<div class="form-group">
						<label for="tipovia">Tipo de vía</label>
						<?php echo printTiposViaSelect(); ?>
					</div>
				<div class="form-row">
					<div class="form-group col-md-9">
						<label for="nombre_via">Nombre de vía</label>
						<input type="text" id="nombre_via" name="nombre_via" class="form-control">
					</div>
					<div class="form-group col-md-3">
						<label for="nombre_via">Número</label>
						<input type="text" id="numero" name="numero" class="form-control">
					</div>
				</div>
					<div class="form-row">
					<div class="form-group col">
						<label for="piso">Piso</label>
						<input type="text" id="piso" name="piso" class="form-control">
					</div>
					<div class="form-group col">
						<label for="puerta">Puerta</label>
						<input type="text" id="puerta" name="puerta" class="form-control">
					</div>
					</div>
					<div class="form-row">
					<div class="form-group col">
						<label for="localidad">Ciudad</label>
						<input type="text" id="localidad" name="localidad" class="form-control">
					</div>
					<div class="form-group col">
						<label for="provincia">Provincia</label>
						<input type="text" id="provincia" name="provincia" class="form-control">
					</div>
					</div>
					<div class="form-row">
					<div class="form-group col">
						<label for="codigo_postal">Código Postal</label>
						<input type="text" id="codigo_postal" name="codigo_postal" class="form-control">
					</div>
					<div class="form-group col">
						<label for="pais">Pais</label>
						<input type="text" id="pais" name="pais" class="form-control">
					</div>
					</div>

					<?php
					echo '<input type="hidden" name="id" value="'.explode("-and-", $_COOKIE['practicaweb'])[0].'">';
					?>

					<div class="form-group">
					<input type="submit" class="btn btn-primary btn-block form-control" value="Agregar">
					</div>
				</form>
			</div>
		</div>
		</div>

	</body>
</html>