<?php

date_default_timezone_set('Europe/Madrid');

$conexion = mysqli_connect("localhost", "practica", "practica", "practicaweb_database", "3306");
  if (!$conexion->set_charset("utf8")) {
    printf(" Error cargando el conjunto de caracteres utf8: %s\n", $conexion->error);
}

function dbstatus(){
	if (mysqli_connect_errno($conexion)){
  		echo '<img src="img/green-button-x20.png">';
  	}else{
  		echo '<img src="img/green-button-x20.png">';
  	}
}
