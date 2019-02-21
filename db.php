<?php

date_default_timezone_set('Europe/Madrid');

$conexion = mysqli_connect("localhost", "practica", "practica", "antonio_sastre_programacionweb", "3306");


function dbstatus(){
	if (mysqli_connect_errno($conexion)){
  		echo 'img/red-button-x20.png';
  	}else{
  		echo 'img/green-button-x20.png';
  	}
}
