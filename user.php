<?php

if(isset($_GET['a']) && $_GET['a']=="close"){
		setcookie('practicaweb', "", time() - 86400, "/"); // 86400 = 1 day

		header('Location: index.php');

	}else{

		require_once 'db.php';

		if(!isValidCookie("practicaweb")){

			header('Location: index.php');

		}else{

			$usr = usuarioAssocArray(explode("-and-", $_COOKIE['practicaweb'])[0]);

			if(userIsAdmin(explode("-and-", $_COOKIE['practicaweb'])[0]) && isset($_GET['user']) && !empty($_GET['user'])) $usr = $_GET['user'];

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

						<div class="col-md-6">

							<h1>Actualizar datos personales</h1>

							<form action="user-register-engine.php?update=user" method="POST">

								<input type="hidden" name="usuario" value="<?php echo $usr['id']; ?>">

								<div class="form-group">
									<label for="name">Nombre completo</label>
									<input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $usr['nombre']; ?>">
								</div>
								<div class="form-group">
									<label for="username">Email</label>
									<input type="text" class="form-control" id="email" name="email" aria-describedby="emailhelp" value="<?php echo $usr['email']; ?>">
								</div>

								<div class="form-group">
									<button type="submit" class="btn btn-primary">Actualizar mis datos</button>
								</div>

							</form>

							</div>
							<div class="col-md-6">



							<h1>Actualizar contraseña</h1>

							<form action="user-register-engine.php?update=pass" method="POST">

								<input type="hidden" name="usuario" value="<?php echo $usr['id']; ?>">

								<div class="form-group">
									<label for="name">Antigua contraseña</label>
									<input type="password" class="form-control" id="antiguapass" name="antiguapass" placeholder="********">
								</div>
								<div class="form-group">
									<label for="name">Nueva contraseña</label>
									<input type="password" class="form-control" id="nuevapass1" name="nuevapass1" placeholder="********">
								</div>
								<div class="form-group">
									<label for="name">Repite nueva contraseña</label>
									<input type="password" class="form-control" id="nuevapass2" name="nuevapass2" placeholder="********">
								</div>

								<div class="form-group">
									<button type="submit" class="btn btn-warning">Actualizar contraseña</button>
								</div>

							</form>

						</div>
					</div>
				</div>
				
			</body>
			</html>

			<?php
		} 
	}
	?>