<?php

include 'db.php';
require_once 'configuration.php'

$idfoto = $_GET['id'];
$randfoto = $_GET['rand'];

$url = fotourl($idfoto, $randfoto);

$foto = file_get_contents(FOTOSTORAGE.$url); 
header('content-type: image/jpeg'); 

echo $foto;

?>