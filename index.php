<?php

require_once 'db.php';
require_once 'configuration.php';

?>

<!DOCTYPE html>
<html>
	<head>
		<?php include 'head.php'; ?>
	</head>
	<body>

		<?php include 'topbar.php'; ?>

		<?php
		echo '<h1>Hola mundo</h1>'.dbstatus();
		?>
	</body>
</html>