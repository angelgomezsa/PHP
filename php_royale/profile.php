<?php
require_once 'bbdd_user.php';
session_start();
if (isset($_SESSION["user"])) {
	?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<title>Perfil de usuario</title>
	</head>
	<body>
		<div class="container">
			<h2>Datos del usuario</h2>
			<?php 
			$userData = getUserDataByUsername($_SESSION["user"]);
			?>
			<form class="form-horizontal">
				<div class="form-group">
					<label class="col-sm-1 control-label">Nombre</label>
					<div class="col-sm-10">
						<p class="form-control-static"><?php echo $userData["username"]; ?></p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-1 control-label">Victorias</label>
					<div class="col-sm-10">
						<p class="form-control-static"><?php echo $userData["wins"]; ?></p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-1 control-label">Nivel</label>
					<div class="col-sm-10">
						<p class="form-control-static"><?php echo $userData["level"]; ?></p>
					</div>
				</div>								
			</form>
			<h2 style="margin: 20px 0">Cartas</h2>
			<table class="table table-bordered">
				<tr>
					<th>Nombre</th>
					<th>Tipo</th>
					<th>Calidad</th>
					<th>Vida</th>
					<th>Daño</th>
					<th>Elixir</th>
					<th>Nivel</th>
				</tr>
				<?php  
				$cardData = getUserCardsByUsername($_SESSION["user"]);
				while ($row = mysqli_fetch_array($cardData)) {
					echo "
					<tr>
						<td>".$row["name"]."</td>
						<td>".$row["type"]."</td>
						<td>".$row["rarity"]."</td>
						<td>".($row["hitpoints"]+$row["level"]*2)."</td>
						<td>".($row["damage"]+$row["level"]*2)."</td>
						<td>".$row["cost"]."</td>
						<td>".$row["level"]."</td>
					</tr>	
					";
				}
				?>
			</table>
			<a class="btn btn-default" href="home_user.php" role="button">Volver</a>
		</div>
	</body>
	</html>
	<?php
} else {
	echo "<p>Debes hacer login para poder ver esta pagina</p>";
}
?>