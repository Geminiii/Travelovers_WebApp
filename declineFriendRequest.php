<?php
session_start();
include "connectToDB.php";
$uid = $_SESSION['uid'];
if($_SERVER["REQUEST_METHOD"] == "POST") {
	$sender = $_POST['decline'];
	//$decline1 = "DELETE FROM Friendship WHERE uid1 = $uid  AND uid2 = $sender;";
	$decline2 = "DELETE FROM Friendship WHERE uid2 = $uid  AND uid1 = $sender;";
	//if (mysqli_query($link, $decline1)){
		if(mysqli_query($link, $decline2)){
			header('Location:/home.php');
		}else{
			echo "Error:".$decline1.$decline2."<br>";
		}
	//}else{
		//echo "declined";
	//}
}
?>