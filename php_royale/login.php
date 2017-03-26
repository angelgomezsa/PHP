<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h1 class="text-center" style="margin: 40px 0">Login</h1>
                <form class="form-horizontal" action="" method="post">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Usuario</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Nombre de usuario" name ="username" maxlength="20" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Contraseña</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" placeholder="Contraseña" name="pass" maxlength="10" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" name="login" class="btn btn-primary" value="Entrar">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
    <?php
    require_once 'bbdd_user.php';
    if (isset($_POST["login"])) {
        $username = $_POST["username"];
        $pass = $_POST["pass"];
        if (validateUser($username, $pass)) {
            session_start();
            $_SESSION["user"] = $username;
            $_SESSION["type"] = getTypeByUsername($username);
            if ($_SESSION["type"] == 0) {
                header("Location: home_user.php");
            } else if ($_SESSION["type"] == 1) {
                header("Location: admin_panel.php");
            }
        } else {
            echo "<p>Usuario o contraseña incorrectos.</p>";
        }
    }
    ?>
</body>
</html>