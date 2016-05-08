<?php
session_start();
include "connectToDB.php";
$uid = $_SESSION['uid'];
if($_SERVER["REQUEST_METHOD"] == "POST") {
	$sender = $_POST['accept'];
	$accept1 = "insert into Friendship(uid1, uid2, visibility, status) values ($uid,$sender, 3, 1)";
	$accept2 = "update Friendship set status = 1, visibility = 3 where uid2 = $uid and uid1 = $sender";
	if (mysqli_query($link, $accept1) == true){

	}else{
	}
	if(mysqli_query($link, $accept2) == true){
		header('Location:/home.php');
	}else{
		echo "Error:".$accept2.$accept1."<br>";
	}
}
?>