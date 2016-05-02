<?php
ini_set('display_errors', 'On');
$serverName='localhost';
$username = 'root';
$password = 'root';
// Create connection
$conn = new mysqli($serverName, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);

}
mysqli_select_db($conn, "DB_Project1") or die( "Unable to select database");
$mysqli = new mysqli($serverName,$username,$password,"DB_Project1");
