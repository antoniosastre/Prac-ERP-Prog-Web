<!DOCTYPE HTML>
<?php 

require_once 'db.php';

	if(!isValidCookie("practicaweb")){

		if(!empty($_POST['user']) && !empty($_POST['password'])){

			if(logincredentials(idOfEmail($_POST['user']),$_POST['password'])){
				
				setcookie('practicaweb', idOfEmail($_POST['user'])."-and-".lastgivencookie(idOfEmail($_POST['user'])), time() + (86400 * 7), "/");
				$loginerror = 0;

			}else{
				$loginerror = 1;
			}
		}else{
			$loginerror = 1;
		}
	}else{
		$loginerror = 2;

	}

?>
<html>
	<head>
	<meta http-equiv="refresh" content="1;url=index.php">
        <script type="text/javascript">
            window.location.href = "index.php"
        </script>
	</head>
</html>
