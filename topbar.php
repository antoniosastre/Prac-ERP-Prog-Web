<?php

require_once 'db.php';

?>

<nav class="navbar sticky-top navbar-dark bg-dark">
	<img class="navbar-brand" src="<?php dbstatus(); ?>">
  	<a class="navbar-brand h1" href="#">Papelería 'Perdiendo los papeles'</a>

  	<form class="form-inline" action="login-engine.php" method="POST" enctype="multipart/form-data">
  		<label class="sr-only" for="user">Usuario/Email</label>
  		<input type="text" name="user" class="form-control mr-sm-2" id="navbar-login-user" placeholder="Usuario/Email">

  		<label class="sr-only" for="password">Contraseña</label>
    	<input type="text" name="password" class="form-control mr-sm-2" id="navbar-login-pass" placeholder="Contraseña">

  		<button type="submit" class="btn btn-outline-info my-2 my-sm-0">Entrar</button>
	</form>


</nav>