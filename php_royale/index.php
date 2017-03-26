<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Stucom Royale</title>
</head>
<body>
	<?php 
	if (session_status() === PHP_SESSION_ACTIVE) {
		session_destroy();
	}
	?>
	<h1>Bienvenido a Stucom Royale!</h1>
	<a href="registro.php">Registro</a><br>
	<a href="login.php">Login</a>
</body>
</html>