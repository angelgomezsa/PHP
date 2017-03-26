<?php
require_once 'bbdd_user.php';
session_start();
if (isset($_SESSION["user"])) {
	if (isset($_POST["mod"])) {
		$curPass = $_POST["curPass"];
		if (validateUser($_SESSION["user"], $curPass)) {
			$newPass = $_POST["newPass"];
			if ($newPass ==  $_POST["verif"]) {
				updatePassword($_SESSION["user"], $newPass);
			} else {
				echo "<p> Las contraseñas no coinciden</p>";
			}
		} else {
			echo "<p> La contraseña actual es incorrecta </p>";
		}
	}
	?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Modificar Password</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<h1 style="margin: 40px 0">Modificar Password</h1>
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-2 control-label">Contraseña actual </label>
					<div class="col-sm-3">
						<input type="password" class="form-control" name="curPass" maxlength="10" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Nueva contraseña</label>
					<div class="col-sm-3">
						<input type="password" class="form-control" name="newPass" maxlength="10" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Verifica contraseña</label>
					<div class="col-sm-3">
						<input type="password" class="form-control" name="verif" maxlength="10" required>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-3">
						<input type="submit" class="btn btn-primary" name="mod" value="Modificar">
						<a class="btn btn-default" href="home_user.php" style="margin-left: 6px">Volver</a>
					</div>
				</div>
			</form>
		</div>
	</body>
	</html>
	<?php
} else {
	echo "<p>Debes hacer login para poder ver esta pagina</p>";
}
?>
