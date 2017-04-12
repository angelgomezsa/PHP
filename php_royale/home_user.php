<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (isset($_SESSION["user"])) {
	?>
	<head>
		<meta charset="UTF-8">
		<title>Pagina de usuario</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<h1>Bievenido <?php echo $_SESSION["user"]; ?></h1>
			<ul>
				<li><a href="modPass.php">Modificar password</a></li>
				<li><a href="profile.php">Ver Perfil</a></li>
				<li><a href="battle.php">Batalla</a></li>
				<li><a href="logout.php">Salir</a></li>
			</ul>
		</div>
	</body>
	</html>
<?php
} else {
	echo "<p>Debes hacer login para poder ver esta pagina</p>";
}
?>
