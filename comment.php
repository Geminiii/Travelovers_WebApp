<?php
/**
 * Created by PhpStorm.
 * User: Li
 * Date: 5/2/16
 * Time: 3:26 AM
 */

session_start();

ini_set('display_errors', 'On');

include ('connectToDB.php');
/*$link = mysqli_connect('localhost','root','root');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
mysqli_select_db($link,'DB_Project1') or die( "Unable to select database");*/
$comment = "INSERT INTO Comment() VALUES ()";


