<?php 

require_once 'db.php';

	if(isValidCookie("practicaweb")){

		$campoVacio = false;

		if(empty($_POST['id'])) {
			$campoVacio = true;
		}
		if(empty($_POST['nombre'])) {
			$campoVacio = true;
		}
		if(empty($_POST['tipo_via'])) {
			$campoVacio = true;
		}
		if(empty($_POST['nombre_via'])) {
			$campoVacio = true;
		}
		if(empty($_POST['numero'])) {
			$campoVacio = true;
		}
		if(empty($_POST['piso'])) {
			$campoVacio = true;
		}
		if(empty($_POST['puerta'])) {
			$campoVacio = true;
		}
		if(empty($_POST['codigo_postal'])) {
			$campoVacio = true;
		}
		if(empty($_POST['pais'])) {
			$campoVacio = true;
		}
		if(empty($_POST['provincia'])) {
			$campoVacio = true;
		}
		if(empty($_POST['localidad'])) {
			$campoVacio = true;
		}

		if(!$campoVacio){


			$status = registrarDireccion($_POST['id'], $_POST['nombre'], $_POST['tipo_via'], $_POST['nombre_via'], $_POST['numero'], $_POST['piso'], $_POST['puerta'], $_POST['codigo_postal'], $_POST['pais'], $_POST['provincia'], $_POST['localidad']);

		}else{

		}

	}

	header("location: direcciones.php");

?>
