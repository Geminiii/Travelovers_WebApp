<?php
/**
 * Created by PhpStorm.
 * User: Li
 * Date: 5/3/16
 * Time: 2:34 AM
 */
session_start();

ini_set('display_errors', 'On');

include ('connectToDB.php');

$uid=$_SESSION['uid'];
$pid=$_SESSION['pid'];

$addLike="INSERT INTO Post_like(uid, pid, pltime, pl_viewed, dislike) VALUES ('$uid', '$pid', NULL, 0, 0)";

if(mysqli_query($link, $addLike)){
    header("Location:/display.php?pid=$pid");
}else{
    echo "Please do not like or dislike the same post multiple times!";
}