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

			?>

			<!DOCTYPE html>
			<html>
			<head>
				<?php include 'head.php'; ?>
			</head>
			<body>

				<?php include 'topbar.php'; ?>

				<div class="container">

					<form action="user-register-engine.php?update=yes" method="POST">

						<input type="hidden" name="usuario" value="<?php echo $usr['id']; ?>">

						<div class="form-group">
							<label for="name">Nombre completo</label>
							<input type="text" class="form-control" id="name" name="name" value="<?php echo $usr['nombre']; ?>">
						</div>
						<div class="form-group">
							<label for="username">Email</label>
							<input type="text" class="form-control" id="email" name="email" aria-describedby="emailhelp" value="<?php echo $usr['email']; ?>">
						</div>

						<div class="form-group">
						<button type="submit" class="btn btn-primary">Editar mis datos</button>
						</div>

					</form>

				</div>
				
			</body>
			</html>

			<?php
		} 
	}
	?>