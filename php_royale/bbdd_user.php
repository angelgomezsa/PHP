<?php
require_once 'bbdd.php';

function existUser($username) {
    $con = connect("royal");
    $query = "select username from user where username='$username'";
    $res = mysqli_query($con, $query);
    disconnect($con);
    $num_rows = mysqli_num_rows($res);
    if ($num_rows == 0) {
        return false;
    } else {
        return true;
    }
}

function insertUser($username, $pass) {
    $con = connect("royal");
    $insert = "insert into user values('$username', '$pass', 0, 0, 1)";
    if (mysqli_query($con, $insert)) {
        echo "<p>Usuario registrado </p>";
    } else {
        echo mysqli_error($con);
    }
    disconnect($con);
} 

function validateUser($username, $pass) {
    $con = connect("royal");
    $query = "select * from user where username='$username' and password='$pass'";
    $res = mysqli_query($con, $query);
    $num_rows = mysqli_num_rows($res);
    disconnect($con);
    if ($num_rows > 0) {
        return true;
    } else { 
        return false;
    }
}

function getTypeByUsername($username) {
    $con = connect("royal");
    $query = "select type from user where username='$username'";
    $res = mysqli_query($con, $query);
    $row = mysqli_fetch_array($res);
    disconnect($con);
    return $row["type"];
}

function getUserPassByUsername($username) {
    $con = connect("royal");
    $query = "select password from user where username='$username'";
    $res = mysqli_query($con, $query);
    $row = mysqli_fetch_array($res);
    disconnect($con);
    return $row["password"];
}

function updatePassword($username, $pass) {
    $con = connect("royal");
    $update = "update user set password='$pass' where username='$username'";
    if (mysqli_query($con,$update)) {
    echo '<script>alert("Contraseña modificada")</script>';
     //echo "<p>Constraseña modificada</p>";
 } else {
   mysqli_error($con);
}
disconnect($con);
}

function getUserDataByUsername($username) {
    $con = connect("royal");
    $query = "select username, wins, level from user where username='$username'";
    $res = mysqli_query($con, $query);
    $row = mysqli_fetch_array($res);
    disconnect($con);
    return $row;
}

function getUserCardsByUsername($username) {
    $con = connect("royal");
    $query = "select card.name, card.type, card.rarity, card.hitpoints, card.damage, card.cost, deck.level 
    from card
    join deck on deck.card = card.name
    join user on deck.user = user.username
    where deck.user = '$username'";
    $res = mysqli_query($con, $query);
    disconnect($con);
    return $res;
}

function getBattleCard($username, $card) {
   $con = connect("royal");
   $query = "select card.name, card.type, card.rarity, (card.hitpoints+deck.level)*2 hp, (card.damage+deck.level)*2 dmg, card.cost, deck.level 
   from card
   join deck on deck.card = card.name
   join user on deck.user = user.username
   where deck.user = '$username' and deck.card = '$card'";
   $res = mysqli_query($con, $query);
   disconnect($con);
   return $res;
}

function getNumberOfCards() {
    $con = connect("royal");
    $query = "select * from card";
    $res = mysqli_query($con, $query);
    $num_rows = mysqli_num_rows($res);
    disconnect($con);
    return $num_rows;
}

function getCardNameByPos() {
    $con = connect("royal");
    $rownum = rand(0,getNumberOfCards()-1);
    $query = "select name from card limit 1 offset $rownum";
    $res = mysqli_query($con, $query);
    $row = mysqli_fetch_array($res);
    disconnect($con);
    return $row["name"];
}

function increaseUserLevel($username) {
    $con = connect("royal");
    $update = "update user set level=level+1 where username='$username'";
    if (!mysqli_query($con, $update)) {
        echo mysqli_error($con);
    }
    disconnect($con);
}

function increaseUserWins($username) {
    $con = connect("royal");
    $update = "update user set wins=wins+1 where username='$username'";
    if (!mysqli_query($con, $update)) {
        echo mysqli_error($con);
    }
    disconnect($con);
}

function getUserWinsByUsername($username) {
    $con = connect("royal");
    $query = "select wins from user where username='$username'";
    $res = mysqli_query($con, $query);
    $row = mysqli_fetch_array($res);
    disconnect($con);
    return $row["wins"];
}

?>
