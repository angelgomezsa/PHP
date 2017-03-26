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
			<title>Alta de Cartas</title>
		</head>
		<body>
			<?php 
			require_once 'bbdd_admin.php';
			if (isset($_POST["reg"])) {
				$name = $_POST["name"];
				if (cardExists($name)) {
					echo "<p> Ya existe una carta con este nombre </p>";
				} else {
					$type = $_POST["type"];
					$rarity = $_POST["rarity"];
					$hp = $_POST["hp"];
					$dmg = $_POST["dmg"];
					$cost = $_POST["cost"];
					insertCard($name, $type, $rarity, $hp, $dmg, $cost);
				}
			}
			?>
			<div class="container">
				<h1 style="margin: 20px 0 20px 40px">Alta de Cartas</h1>
				<form class="form-horizontal" action="" method="post">
					<div class="form-group">
						<label class="col-sm-2 control-label">Nombre de la carta</label>
						<div class="col-sm-3">
							<input type="text" name="name" class="form-control" maxlength="30" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Tipo</label>
						<div class="col-sm-3">
							<select name="type" class="form-control" required>
								<option value="tropa">Tropa</option>
								<option value="hechizo">Hechizo</option>
								<option value="estructura">Estructura</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Calidad</label>
						<div class="col-sm-3">
							<select name="rarity" class="form-control" required>
								<option value="comun">Común</option>
								<option value="especial">Especial</option>
								<option value="epica">Épica</option>
								<option value="legendaria">Legendaria</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Vida</label>
						<div class="col-sm-3">
							<input type="number" class="form-control" name="hp" min="1" max="20" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Daño</label>
						<div class="col-sm-3">
							<input type="number" class="form-control" name="dmg" min="1" max="20" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Elixir</label>
						<div class="col-sm-3">
							<input type="number" class="form-control" name="cost" min="1" max="10" required>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-3">
							<input type="submit" class="btn btn-primary" name="reg" value="Alta">
							<a style="margin-left: 6px" class="btn btn-default" href="admin_panel.php" role="button">Volver</a>
						</div>
					</div>
				</form>
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