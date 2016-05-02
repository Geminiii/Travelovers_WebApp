<?php

    $link = mysqli_connect(localhost,root,root);
    if (!$link) {
        die('Could not connect: ' . mysql_error());
    }
    mysqli_select_db($link,'DB_Project1') or die( "Unable to select database");

    echo "<p>The attributes of selected table:</p><br>";
    $tableName = $_GET["tableName"];
    $sql_attr="SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA ='DB_Project1' AND TABLE_NAME='$tableName'";
    $records1 = mysqli_query($link, $sql_attr);
    echo "<form action='tables_again.php'>";
    while($res1=mysqli_fetch_assoc($records1)){
        echo "<input type='submit' name='attr' value='$res1[COLUMN_NAME]'><br>";
    };
    echo "</form><br>";
?>