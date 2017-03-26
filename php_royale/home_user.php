<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (isset($_SESSION["user"])) {
	?>
	<head>
		<meta charset="UTF-8">
		<title>Pagina de usuario</title>
	</head>
	<body>
	<?php echo "<h1>Bievenido ".$_SESSION["user"]."</h1>"; ?>
		<a href="modPass.php">Modificar password</a><br>
		<a href="profile.php">Ver Perfil</a><br>
		<a href="battle.php">Batalla</a><br>
		<a href="index.php">Salir</a>
	</body>
	</html>
	<?php
} else {
	echo "<p>Debes hacer login para poder ver esta pagina</p>";
}
?>
