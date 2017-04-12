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
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		</head>
		<body>
			<div class="container">
				<h1>Admin Panel</h1>
				<ul>
					<li><a href="altaCarta.php">Alta de Cartas</a></li>
					<li><a href="userRanking.php">Ranking de mejores usuarios</a></li>
					<li><a href="deleteUser.php">Borrar usuario</a></li>
					<li><a href="addCard.php">Incorporar una carta a un usuario</a></li>
					<li><a href="logout.php">Salir</a></li>
				</ul>
			</div>
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