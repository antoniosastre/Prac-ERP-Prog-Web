<?php

require_once 'db.php';

?>

<nav class="navbar sticky-top navbar-dark bg-dark navbar-expand-lg topbar">
	
	<img class="navbar-brand" src="<?php dbstatus(); ?>">
	
	<a class="navbar-brand h1" href="index.php">Papelería 'Perdiendo los papeles'</a>
	
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span></button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">


    </div>

	<?php

	if(isValidCookie("practicaweb")){

		echo '<ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.userShowNameById(explode("-and-", $_COOKIE['practicaweb'])[0]).'</a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
 
          	<a class="dropdown-item" href="user.php">Página de usuario</a>
           	<a class="dropdown-item" href="direcciones.php">Mis direcciones</a>
    
          <div class="dropdown-divider"></div>
         <a class="dropdown-item" href="user.php?a=close">Cerrar Sesión</a>
        </div>
      </li>
    </ul>';

	}else{

		if(!isset($_GET['hideregister'])){
		echo '<form class="form-inline" action="login-engine.php" method="POST" enctype="multipart/form-data">
		<label class="sr-only" for="user">Email</label>
		<input type="email" name="user" class="form-control mr-sm-2 form-control-sm" id="navbar-login-user" placeholder="Email">

		<label class="sr-only" for="password">Contraseña</label>
		<input type="password" name="password" class="form-control mr-sm-2 form-control-sm" id="navbar-login-pass" placeholder="Contraseña">

		<button type="submit" class="btn btn-outline-info btn-sm mr-sm-2">Iniciar Sesión</button>
	</form>
	<button type="button" class="btn btn-outline-warning btn-sm mr-sm-2" data-toggle="modal" data-target="#registerModal">
  Registrarse</button>';

		}
	}

	?>

</nav>

<?php require_once 'user-register.php'; ?>