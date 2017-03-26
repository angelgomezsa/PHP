<?php  
session_start();
if (isset($_SESSION["user"])) {
	if ($_SESSION["type"] == 1) {
		?>
		<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
			<title>Ranking</title>
		</head>
		<body>
			<?php require_once 'bbdd_admin.php'; ?>
			<div class="container">
				<h1>Ranking Usuarios</h1>
				<table class="table table-bordered">
					<tr>
						<th>Nombre</th>
						<th>Victorias</th>
						<th>Nivel</th>
					</tr>
					<?php 
					$rank = userRanking();
					while ($row = mysqli_fetch_array($rank)) {
						echo "
						<tr>
							<td>".$row["username"]."</td>
							<td>".$row["wins"]."</td>
							<td>".$row["level"]."</td>
						</tr>";
					}
					?>
				</table>
				<a class="btn btn-default" href="admin_panel.php" role="button">Volver</a>
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