<?php
/**
 * Created by PhpStorm.
 * User: Li
 * Date: 4/30/16
 * Time: 5:37 PM
 */
//session_start();

echo "<div>";
header("Content-type: image/jpeg");
echo $_SESSION['image'];
echo "</div>";