<?php
session_start();
ini_set('display_errors', 'On');
include("connection.php"); //connect server
//retrieve data
//$tel = $biography = $photo = $visibility
$uid = $_SESSION['uid'];
if(!isset($_SESSION['uid'])){
	echo 'Please login first';
    //header("Location: signin.php");
}else{
	$tel = $_POST["tel"];
	$biography = $_POST["biography"];
	$visibility = $_POST["visibility"];
	$city = $_POST["city"];
	$photo = "";
	if (!empty($_FILES['photo']['tmp_name'])){
		$photoFileName = $_FILES['photo']['tmp_name'];
		if ($photoFileName){
			$photo =addslashes(file_get_contents($photoFileName));
		}
		$updatePhoto = "UPDATE Profile SET photo = '{$photo}' WHERE uid = '$uid'";
		$photoResult = mysqli_query($conn, $updatePhoto);
		if($photoResult){
		}
	}
	if($_SERVER["REQUEST_METHOD"]){
		$updateProfileQuery = "UPDATE Profile SET tel = '$tel', biography = '$biography', visibility = '$visibility' WHERE uid = '$uid'";
		$profileResult = mysqli_query($conn, $updateProfileQuery);
		$updateCity = "UPDATE User SET city='$city' WHERE uid = '$uid'";
		$cityResult = mysqli_query($conn, $updateCity);
		if($profileResult || $cityResult){

			header("refresh:3;url = myProfile.php");
			echo 'Your Profile Has been Updated';

		}


	}


}