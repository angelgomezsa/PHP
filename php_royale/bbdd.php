<?php
function connect($database) {
    $con = mysqli_connect("localhost", "root", "", $database)
            or die("No se ha podido conectar con la BBDD.");
    return $con;
}

function disconnect($con) {
    mysqli_close($con);
}

?>

