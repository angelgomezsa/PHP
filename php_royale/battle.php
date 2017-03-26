<?php
require_once 'bbdd_user.php';
session_start();
if (isset($_SESSION["user"])) {
	if (isset($_POST["battle"])) {
	$card = $_POST["card"];
	$cardData = mysqli_fetch_array(getBattleCard($username,$card));
		$f1 = rand(0,50); // fase 1
		$wins = 0;
		if ($cardData["hp"]>$f1) $wins++;
	}
	?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<title>Batalla</title>
	</head>
	<body>
		<div class="container">
			<h1 style="margin: 40px 0"> Batalla</h1>
			<form action="" method="post" class="form-horizontal">
				<div class="form-group">
					<label class="col-sm-1 control-label">Carta</label>
					<div class="col-sm-3">
						<select class="form-control" name="card">
							<option value="">Selecciona una carta</option>
							<?php
							$cardData = getUserCardsByUsername($_SESSION["user"]);
							while ($row = mysqli_fetch_array($cardData)) { 
								echo "<option value='".$row["name"]."'>".$row["name"]."</option>";
							}
							?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-1 col-sm-3">
						<input type="submit" class="btn btn-primary" name="battle" value="Batalla">
						<a class="btn btn-default" href="home_user.php" role="button" style="margin-left: 6px">Volver</a>
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