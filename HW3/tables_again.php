<?php

    $link = mysqli_connect(localhost,root,root);
    if (!$link) {
        die('Could not connect: ' . mysql_error());
    }
    mysqli_select_db($link,'DB_Project1') or die( "Unable to select database");
    
    echo "<p>Tables containing the attribute selected above:</p><br>";
    $attr = $_GET["attr"];
    $sql_tables="SELECT TABLE_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE COLUMN_NAME = '$attr'";
    $records2 = mysqli_query($link, $sql_tables);
    echo "<form>";
    while($res2=mysqli_fetch_assoc($records2)){
        echo "<p>".$res2[TABLE_NAME]."</p>";
    };
    echo "</form>";
    
?>