<?php 
session_start();
if (isset($_SESSION["user"])) {
	if ($_SESSION["type"] == 1) {
		?>
		<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<title>Admin Panel</title>
		</head>
		<body>
			<h1>Admin Panel</h1>
			<a href="altaCarta.php">Alta de Cartas</a><br>
			<a href="userRanking.php">Ranking de mejores usuarios</a><br>
			<a href="deleteUser.php">Borrar usuario</a><br>
			<a href="addCard.php">Incorporar una carta a un usuario</a>
		</body>
		</html>
		<?php 
	} else {
		echo "<p> No tienes permisos para ver esta pagina </p>";
	}
} else {
	echo "<p> No hay un usuario validado </p>";	
}
?>