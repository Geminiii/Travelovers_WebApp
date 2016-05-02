
<?php
    echo "<p>Search result:</p><br>";
    $search = $_GET["search"];
    $link = mysqli_connect(localhost,root,root);
    if (!$link) {
        die('Could not connect: ' . mysql_error());
    }
    mysqli_select_db($link,'DB_Project1') or die( "Unable to select database");
    $sql="SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA ='DB_Project1' AND TABLE_NAME LIKE '%$search%'";
    $records = mysqli_query($link, $sql);
    echo "<form action='attributes.php'>";
    while($res=mysqli_fetch_assoc($records)){
        echo "<input type='submit' name='tableName' value='$res[TABLE_NAME]'><br>";
    };
    $records = "";
    echo "</form><br>";
    
    
?>

