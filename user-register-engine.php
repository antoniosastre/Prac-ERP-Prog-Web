<?php 

require_once 'db.php';

	if(!isValidCookie("practicaweb")){

		if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password'])){

			$status = registrarUsuario($_POST['name'], $_POST['email'], $_POST['password']);

			if ($status){

				setcookie('practicaweb', idOfEmail($_POST['email'])."-and-".lastgivencookie(idOfEmail($_POST['email'])), time() + (86400 * 7), "/");
			}
		}

	}



header('Location: index.php');

?>