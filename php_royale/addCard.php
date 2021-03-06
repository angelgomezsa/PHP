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
			<title>Añadir Carta</title>
		</head>
		<body>
			<?php require_once 'bbdd_admin.php'; 
			if (isset($_POST["add"])) {
				$user = $_POST["user"];
				$card = $_POST["card"];
				addCardToUser($user, $card);
			}
			?>
			<div class="container">
				<h1 style="margin: 40px 0">Añadir carta a un usuario</h1>
				<form class="form-horizontal" action="" method="post">
					<div class="form-group">
						<label class="col-sm-1 control-label">Usuario</label>
						<div class="col-sm-3">
							<select name="user" class="form-control" required>
								<option value="">Selecciona un usuario</option>
								<?php
								$users = selectAllUsernames();
								while ($row = mysqli_fetch_array($users)) {
									extract($row);
									echo "<option value='$username'>$username</option>";
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-1 control-label">Carta</label>
						<div class="col-sm-3">
							<select name="card" class="form-control" required>
								<option value="">Selecciona una carta</option>
								<?php
								$cards = selectAllCardNames();
								while ($row = mysqli_fetch_array($cards)) {
									extract($row);
									echo "<option value='$name'>$name</option>";
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-1 col-sm-3">
							<input type="submit" class="btn btn-primary" name="add" value="Añadir">
							<a class="btn btn-default" href="admin_panel.php" role="button" style="margin-left: 6px">Volver</a>
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