<?php
/**
 * Created by PhpStorm.
 * User: Li
 * Date: 5/4/16
 * Time: 4:52 PM
 */
session_start();

ini_set('display_errors', 'On');

include ('connectToDB.php');

$join = "INSERT INTO Join_activity(uid, pid, jtime) VALUES ('$_SESSION[uid]', '$_SESSION[pid]', NULL)";
$pid = $_SESSION['pid'];
if(mysqli_query($link, $join)===TRUE){
    header("refresh:3;url = display.php?pid=$pid");
}else{
    echo "Error:".$post."<br>";
}