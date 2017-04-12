<?php 
require_once 'bbdd.php';

function cardExists($name) {
	$con = connect("royal");
	$query = "select name from card where name='$name'";
	$res = mysqli_query($con, $query);
	disconnect($con);
	$num_rows = mysqli_num_rows($res);
	if ($num_rows == 0) {
		return false;
	} else {
		return true;
	}
}

function insertCard($name, $type, $rarity, $hp, $dmg, $cost) {
	$con = connect("royal");
	$insert = "insert into card values('$name', '$type', '$rarity', '$hp', '$dmg', '$cost')";
	if (mysqli_query($con, $insert)) {
		echo "<p> Carta dada de alta </p>";
	} else {
		echo mysqli_error($con);
	}
	disconnect($con);
}

function deleteUserByName($username) {
	$con = connect("royal");
	$delete = "delete from user where username='$username'";
	if (mysqli_query($con, $delete)) {
		echo "<p>Usuario eliminado</p>";
	} else {
		mysqli_error($con);
	}
	disconnect($con);
}

function selectAllUsernames() {
	$con = connect("royal");
	$query = "select username from user where type=0";
	$res = mysqli_query($con, $query);
	disconnect($con);
	return $res;
} 

function selectAllCardNames() {
	$con = connect("royal");
	$query = "select name from card";
	$res = mysqli_query($con, $query);
	disconnect($con);
	return $res;
}

function addCardToUser($user, $card) {
	$con = connect("royal");
	$query = "select user, card from deck where user='$user' and card='$card'";
	$res = mysqli_query($con, $query);
	$num_rows = mysqli_num_rows($res);
	if ($num_rows == 0) {
		$insert = "insert into deck values('$user', '$card','1')";
		if (mysqli_query($con, $insert)) {
			echo "<p>La carta $card ha sido entragada a $user </p>";
		} else {
			echo mysqli_error($con);
		}
	} else {
		$update = "update deck set level=level+1 where user='$user' and card='$card'";
		if (mysqli_query($con,$update)) {
			echo "<p> La carta $card de $user sube un nivel </p>";
		} else {
			mysqli_error($con);
		}
	}
	disconnect($con);
}

function increaseCardLevel($user, $name) {
	$con = connect("royal");
	$update = "update deck set level=level+1 where user='$user' and card='$card'";
	if (!mysqli_query($con,$update)) {
		mysqli_error($con);
	}
	disconnect($con);
}

function addCardUser($user, $name) {
	$con = connect("royal");
	$insert = "insert into deck values('$user', 'card','1')";
	if (mysqli_query($con, $insert)) {
		echo "<p> Carta entragada a $name </p>";
	} else {
		echo mysqli_error($con);
	}
	disconnect($con);
}

function userRanking() {
	$con = connect("royal");
	$query = "select * from user where type=0";
	$res = mysqli_query($con, $query);
	disconnect($con);
	return $res;
}

?>