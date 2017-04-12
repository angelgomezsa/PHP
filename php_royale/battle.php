
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<title>Batalla</title>
</head>
<body>
	<div class="container">
		<?php
		require_once 'bbdd_user.php';
		require_once 'bbdd_admin.php';
		session_start();
		if (isset($_SESSION["user"])) {
			// FASE 1
			if (isset($_POST["fase1"])) {
				echo '<h2 style="margin: 30px 0"> Fase 1 de la batalla </h2>';
				$card = $_POST["card"];
				$cardData = mysqli_fetch_array(getBattleCard($_SESSION["user"],$card));
				$rnd = rand(0,50);
				$wins = 0;
				echo "<p>Vida de la carta seleccionada: ".$cardData["hp"]."</p>";
				echo "<p>Numero elegido por la aplicacion: ".$rnd."</p>";
				if ($cardData["hp"]>$rnd) {
					$wins++;
					echo "<p>Has ganado!</p>";
				} else {
					echo "<p>Has perdido...</p>";
				} 
				?>
				<form style="margin-top: 20px" action="" method="post">
					<input type="hidden" name="wins" value="<?php echo $wins ?>">
					<div class="form-group">
						<input type="submit" class="btn btn-primary" name="selfase2" value="Fase 2">
					</div>
				</form>
				<!-- FASE 2 -->
			<?php } else if (isset($_POST["fase2"])) {
				echo '<h2 style="margin: 30px 0"> Fase 2 de la batalla </h2>';
				$wins = $_POST["wins"];
				$card = $_POST["card"];
				$cardData = mysqli_fetch_array(getBattleCard($_SESSION["user"],$card));
				$type = array("estructura","hechizo","tropa");
				$rnd = rand(0,2);
				echo "<p>Tipo de la carta seleccionada: ".$cardData["type"]."</p>";
				echo "<p>Tipo elegido por la aplicacion: ". $type[$rnd]."</p>";
				if ($cardData["type"] == $type[$rnd]) {
					$wins++;
					echo "<p>Has ganado!</p>";
				} else {
					echo "<p>Has perdido...</p>";
				} 
				?>
				<form style="margin-top: 20px" action="" method="post">
					<input type="hidden" name="wins" value="<?php echo $wins ?>">
					<div class="form-group">
						<input type="submit" class="btn btn-primary" name="selfase3" value="Fase 3">
					</div>
				</form>
				<!-- FASE 3 -->
			<?php } else if (isset($_POST["fase3"])) { 
				echo '<h2 style="margin: 30px 0"> Fase 3 de la batalla </h2>';
				$wins = $_POST["wins"];
				$card = $_POST["card"];
				$cardData = mysqli_fetch_array(getBattleCard($_SESSION["user"],$card));
				$rnd = rand(0,10);
				echo "<p>Elixir de la carta seleccionada: ".$cardData["cost"]."</p>";
				echo "<p>Numero elegido por la aplicacion: ".$rnd."</p>";
				if ($cardData["cost"]>$rnd) {
					$wins++;
					echo "<p>Has ganado!</p>";
				} else {
					echo "<p>Has perdido...</p>";
				} 

				if ($wins>=2) {
					echo "<p> Has ganado la batalla!</p>";
					increaseUserWins($_SESSION["user"]);
					if (getUserWinsByUsername($_SESSION["user"])%5==0) {
						echo "<p>Recibes un cofre con tres cartas!</p>";
						for ($i = 0;$i<3;$i++) {
							addCardToUser($_SESSION["user"], getCardNameByPos()); 
						}
					}
					if (getUserWinsByUsername($_SESSION["user"])%10==0) {
						echo "<p> Has subido un nivel!</p>";
						increaseUserLevel($_SESSION["user"]);
					}
				} else {
					echo "<p> Has perdido la batalla...</p>";
				}
				?>
				<div style="margin-top: 20px">
					<a class="btn btn-primary" href="battle.php" role="button">Nueva batala</a>
					<a class="btn btn-default" href="home_user.php" role="button" style="rgin-left: 6px">Volver</a>
				</div>
			<?php } else { ?>
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
								} ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-1 col-sm-3">
							<?php if (isset($_POST["selfase3"])) { 
								$wins = $_POST["wins"];
							?>
							<input type="hidden" name="wins" value="<?php echo $wins ?>">
							<input type="submit" class="btn btn-primary" name="fase3" value="Batalla">
							<?php }  else if (isset($_POST["selfase2"])) { 
								$wins = $_POST["wins"];
							?>
							<input type="hidden" name="wins" value="<?php echo $wins ?>">
							<input type="submit" class="btn btn-primary" name="fase2" value="Batalla">
							<?php } else { ?>
							<input type="submit" class="btn btn-primary" name="fase1" value="Batalla">
							<a class="btn btn-default" href="home_user.php" role="button" style="margin-left: 6px">Volver</a>
							<?php } ?>
						</div>
					</div>	
				</form>
			<?php }
		} else {
			echo "<p>Debes hacer login para poder ver esta pagina</p>";
		} ?>
	</div>
</body>
</html>
