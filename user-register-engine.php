<?php 

require_once 'db.php';

	if(!isValidCookie("practicaweb")){

		if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password'])){

			$status = registrarUsuario($_POST['name'], $_POST['email'], $_POST['password']);

			if ($status){

				setcookie('practicaweb', idOfEmail($_POST['email'])."-and-".lastgivencookie(idOfEmail($_POST['email'])), time() + (86400 * 7), "/");
			}
		}

	}else{

		if(userIsAdmin(explode("-and-", $_COOKIE['practicaweb'])[0]) || $_POST['usuario'] == explode("-and-", $_COOKIE['practicaweb'])[0] && $_GET['update']='user'){

			actualizarUsuario($_POST['usuario'], $_POST['nombre'], $_POST['email']);

		}

		if(userIsAdmin(explode("-and-", $_COOKIE['practicaweb'])[0]) || $_POST['usuario'] == explode("-and-", $_COOKIE['practicaweb'])[0] && $_GET['update']='pass'){

			//actualizarPassUsuario($_POST['usuario'], $_POST['nombre'], $_POST['email']);

		}



	}



header('Location: index.php');

?>