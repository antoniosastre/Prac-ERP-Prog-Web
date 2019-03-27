<?php

include('configuration.php');

date_default_timezone_set('Europe/Madrid');

define("DB_HOST", "localhost");
define("DB_USER", "practica");
define("DB_PASS", "practica");
define("DB_DATABASE", "antonio_sastre_programacionweb");
define("DB_PORT", "3306");

function dbstatus(){

	$conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE, DB_PORT);

	if (mysqli_connect_errno($conexion)){
  		echo 'img/red-button-x20.png';
  	}else{
  		echo 'img/green-button-x20.png';
  	}

  	mysqli_close($conexion);
}

function logincredentials($user, $password){

	$conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE, DB_PORT);
	$que = "SELECT contrasena FROM usuarios WHERE id='".$user."'";
	$res = mysqli_query($conexion,$que);

	if(empty($res)){

		mysqli_close($conexion);
		return false;

	}else{
		$linea = mysqli_fetch_array($res);
		
		if(password_verify($password , $linea['contrasena'])){
			
			mysqli_close($conexion);
			return true;

		}

		mysqli_close($conexion);
		return false;
	}
}

function lastgivencookie($id){

	require_once 'functions.php';

	$conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE, DB_PORT);

	$random = generateRandomString();

	$que = "UPDATE usuarios SET lastcookiegiven=\"".$random."\" WHERE id=\"".$id."\"";
	mysqli_query($conexion,$que);

	mysqli_close($conexion);
	return $random;
}

function idOfEmail($email){
	
	$conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE, DB_PORT);
	$que = "SELECT id FROM usuarios WHERE email='".$email."'";
	$res = mysqli_query($conexion,$que);
	$linea = mysqli_fetch_array($res);
	
	mysqli_close($conexion);
	return $linea['id'];
}

function isValidCookie($cookie){

	if(!isset($_COOKIE[$cookie])) return false;

	$exploded = explode("-and-", $_COOKIE[$cookie]);

	$id = $exploded[0];
	$code = $exploded[1];

	$conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE, DB_PORT);
	$que = "SELECT lastcookiegiven FROM usuarios WHERE id='".$id."'";
	$res = mysqli_query($conexion,$que);
	$linea = mysqli_fetch_array($res);
	
	if($linea['lastcookiegiven'] == $code && strlen($linea['lastcookiegiven']) == 8){
		mysqli_close($conexion);
		return true;
	}else{
		mysqli_close($conexion);
		return false;
	}

}

function userShowNameById($id){
	$conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE, DB_PORT);
	$que = "SELECT nombre FROM usuarios WHERE id='".$id."'";
	$res = mysqli_query($conexion,$que);
	$linea = mysqli_fetch_array($res);
	
	mysqli_close($conexion);
	return $linea['nombre'];
}

function registrarUsuario($nombre, $email, $contrasena){
	$conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE, DB_PORT);

	$nombre = mysqli_escape_string($conexion, $nombre);
	$email = mysqli_escape_string($conexion, $email);
	$contrasena = password_hash($contrasena, PASSWORD_DEFAULT);

	$query = "INSERT INTO usuarios (email, nombre, contrasena) VALUES ('".$email."', '".$nombre."', '".$contrasena."')";
	
	mysqli_close($conexion);
	return mysqli_query($conexion,$query);
}

function printTiposViaSelect(){

	$conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE, DB_PORT);
	$que = "SELECT * FROM direcciones_tipos_via ORDER BY nombre ASC";
	$res = mysqli_query($conexion,$que);

	echo '<select class="custom-select" name="tipo_via">';
	echo '<option value=""></option>';

	while($linea = mysqli_fetch_array($res)){
		echo '<option value="'.$linea['id'].'">'.$linea['nombre'].'</option>';
	}

	echo '</select>';

	mysqli_close($conexion);

}

function tipoViaPorId($id){
	$conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE, DB_PORT);
	$que = "SELECT nombre FROM direcciones_tipos_via WHERE id='".$id."'";
	$res = mysqli_query($conexion,$que);
	$linea = mysqli_fetch_array($res);
	
	mysqli_close($conexion);
	return $linea['nombre'];
}

function printDireccionesUsuario($id){

	$conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE, DB_PORT);
	$que = 'SELECT * FROM direcciones WHERE usuario="'.$id.'"';
	$res = mysqli_query($conexion,$que);

	//echo '<div class="card-group">';

	while($linea = mysqli_fetch_array($res)){

	echo '<div class="card tarjeta-direcciones">';
	//echo '<img src="..." class="card-img-top" alt="...">';
	
	echo '<h5 class="card-header">'.$linea['nombre'].'</h5>';
	echo '<div class="card-body">';
	echo '<p class="card-text">'.tipoViaPorId($linea['tipo_via']).' '.$linea['nombre_via'].', '.$linea['numero'];
	echo '<br />'.$linea['piso'].' '.$linea['puerta'].', '.$linea['localidad'];
	echo '<br />'.$linea['provincia'].' ('.$linea['codigo_postal'].') '.$linea['pais'].'</p>';
	echo '</div><div class="card-footer"><a href="#" class="btn btn-primary">Editar</a></div>';
	echo '</div><br />';

	}

	//echo '</div>';

	mysqli_close($conexion);

}

function registrarDireccion($id, $nombre, $tipo_via, $nombre_via, $numero, $piso, $puerta, $codigo_postal, $pais, $provincia, $localidad){

	$conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE, DB_PORT);

	$id = mysqli_escape_string($conexion, $id);
	$nombre = mysqli_escape_string($conexion, $nombre);
	$tipo_via = mysqli_escape_string($conexion, $tipo_via);
	$nombre_via = mysqli_escape_string($conexion, $nombre_via);
	$numero = mysqli_escape_string($conexion, $numero);
	$piso = mysqli_escape_string($conexion, $piso);
	$puerta = mysqli_escape_string($conexion, $puerta);
	$codigo_postal = mysqli_escape_string($conexion, $codigo_postal);
	$pais = mysqli_escape_string($conexion, $pais);
	$provincia = mysqli_escape_string($conexion, $provincia);
	$localidad = mysqli_escape_string($conexion, $localidad);


	$query = "INSERT INTO direcciones (usuario, nombre, tipo_via, nombre_via, numero, piso, puerta, codigo_postal, pais, provincia, localidad) VALUES ('".$id."', '".$nombre."', '".$tipo_via."', '".$nombre_via."', '".$numero."', '".$piso."', '".$puerta."', '".$codigo_postal."', '".$pais."', '".$provincia."', '".$localidad."')";

	//echo $query;
	
	mysqli_close($conexion);
	return mysqli_query($conexion,$query);

}

function printCarruselFotos($producto){

	$conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE, DB_PORT);

	$que = 'SELECT COUNT(id) FROM fotografias WHERE producto="'.$producto.'"';
	$res = mysqli_query($conexion,$que);
	$linea = mysqli_fetch_array($res);
	$numeroFotos = $linea['COUNT(id)'];

	if($numeroFotos > 0){

		$que = 'SELECT id, random FROM fotografias WHERE producto="'.$producto.'"';
		$res = mysqli_query($conexion,$que);

		echo '	<div id="carruselProducto" class="carousel slide" data-ride="carousel">
	  				<ol class="carousel-indicators">';

	  	for ($i=0; $i < $numeroFotos; $i++) { 
	  		if($i == 0){
	  			echo '<li data-target="#carruselProducto" data-slide-to="'.$i.'" class="active"></li>';
	  		}else{
	  			echo '<li data-target="#carruselProducto" data-slide-to="'.$i.'"></li>';
	  		}
	  	}

	  	echo '</ol>';
	  	echo '<div class="carousel-inner">';

	  	$primero = true;

	  	while($foto = mysqli_fetch_array($res)){

	  		if($primero){

	  			echo 	'<div class="carousel-item active">
		      				<img src="foto.php?id='.$foto['id'].'&rand='.$foto['random'].'" class="d-block w-100" alt="...">
		    			</div>';
		    	$primero = false;
	  		}else{
	  			echo '<div class="carousel-item active">
		      			<img src="foto.php?id='.$foto['id'].'&rand='.$foto['random'].'" class="d-block w-100" alt="...">
		    		</div>';
	  		}


	  	}

		echo '</div>
	  			<a class="carousel-control-prev" href="#carruselProducto" role="button" data-slide="prev">
	    			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    			<span class="sr-only">Anterior</span>
	  			</a>
	  			<a class="carousel-control-next" href="#carruselProducto" role="button" data-slide="next">
	    			<span class="carousel-control-next-icon" aria-hidden="true"></span>
	    			<span class="sr-only">Siguiente</span>
	  			</a>
			</div>';

	}

	mysqli_close($conexion);

}

function productoAssocArray($producto){

	$conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE, DB_PORT);
	$que = 'SELECT * FROM productos WHERE id="'.$producto.'"';
	$res = mysqli_query($conexion,$que);
	
	mysqli_close($conexion);
	return mysqli_fetch_array($res);

}

function usuarioAssocArray($usuario){

	$conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE, DB_PORT);
	$que = 'SELECT * FROM usuarios WHERE id="'.$usuario.'"';
	$res = mysqli_query($conexion,$que);
	
	mysqli_close($conexion);
	return mysqli_fetch_array($res);

}

function getLinkFamilia($familia){

	$conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE, DB_PORT);
	$que = 'SELECT * FROM familias WHERE id="'.$familia.'"';
	$res = mysqli_query($conexion,$que);
	$linea = mysqli_fetch_array($res);
	
	mysqli_close($conexion);
	return '<a href="/familia.php?fm='.$linea['id'].'">'.$linea['nombre'].'</a>';

}

function actualizarUsuario($usuario, $nombre, $email){

	$conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE, DB_PORT);
	$que = 'UPDATE usuarios SET nombre="'.$nombre.'", email="'.$email.'" WHERE id="'.$usuario.'"';
	mysqli_query($conexion,$que);

	mysqli_close($conexion);

}

function actualizarPassUsuario($usuario, $nuevapass){

	$conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE, DB_PORT);
	$que = 'UPDATE usuarios SET contrasena="'.password_hash($nuevapass, PASSWORD_DEFAULT).'" WHERE id="'.$usuario.'"';
	mysqli_query($conexion,$que);

	mysqli_close($conexion);

}

function userIsAdmin($usuario){

	$conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE, DB_PORT);
	$que = 'SELECT rol FROM usuarios WHERE id="'.$usuario.'"';
	$res = mysqli_query($conexion,$que);
	$usuario = mysqli_fetch_array($res);

	if($usuario['rol'] = 01) return true;

	mysqli_close($conexion);
	return false;

}

function fotourl($id, $random){

	$conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE, DB_PORT);
	$que = 'SELECT url FROM fotografias WHERE id="'.$id.'" && random="'.$random.'"';
	$res = mysqli_query($conexion,$que);
	$fotourl = mysqli_fetch_array($res);
	return $fotourl['url'];

}

?>
