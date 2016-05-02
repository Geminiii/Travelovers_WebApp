<?php
/**
 * Created by PhpStorm.
 * User: Li
 * Date: 4/28/16
 * Time: 2:34 PM
 */
$link = mysqli_connect('localhost','root','root');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
mysqli_select_db($link,'DB_Project1') or die( "Unable to select database");
