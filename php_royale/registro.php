<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registro</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
	<?php
    require_once 'bbdd_user.php';
    require_once 'bbdd_admin.php';
    if (isset($_POST["reg"])) {
        $username = $_POST["username"];
        if (existUser($username)) {
            echo "<p>Ya existe un usuario con ese nombre.</p>";
        } else {
            $pass = $_POST["pass"];
            $verif = $_POST["verif"];
            if ($pass != $verif) {
                echo "<p>Las contraseñas no coinciden. </p>";
            } else {
                insertUser($username, $pass);
                for ($i=0;$i<3;$i++) {
                    addCardToUser($username, getCardNameByPos()); 
                }
                echo "<p><a href='index.php'>Volver</a></p>";
            }
        }
    } else {
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <h1 class="text-center" style="margin: 40px 0">Registro</h1>
                    <form class="form-horizontal" action="" method="POST">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nombre de usuario</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" name="username" placeholder="Nombre de usuario" maxlength="20" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Contraseña</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="pass" placeholder="Contraseña" maxlength="10" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Confirmar contraseña</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="verif" placeholder="Confirmar contraseña" maxlength="10" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <input type="submit" class="btn btn-primary" name="reg" value="Enviar"><a class="btn btn-default" href="index.php" style="margin-left: 6px">Volver</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
        <?php } ?>
    </body>
    </html>