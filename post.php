<?php
/**
 * Created by PhpStorm.
 * User: Li
 * Date: 4/28/16
 * Time: 4:29 PM
 */

session_start();
ini_set('display_errors', 'On');

$link = mysqli_connect('localhost','root','root');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
mysqli_select_db($link,'DB_Project1') or die( "Unable to select database");

$title = $diary = $picture = $video = $select='';

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["title"])) {
            $nameErr = "Title is required";
        }else{
            $title=$_POST["title"];
        }

        $diary = $_POST["diary"];
        $pictureFileName = $_FILES['picture']['tmp_name'];
        $videoFileName = $_FILES['video']['tmp_name'];
        if ($pictureFileName){$picture =addslashes(file_get_contents($pictureFileName));}
        if ($videoFileName) {$video =addslashes(file_get_contents($pictureFileName));}

        $select = $_POST['visibility'];

        $post="INSERT INTO Post(pid, uid, ptime, lid, title, text, image, video, visibility, activity) VALUES (NULL,".$_SESSION["uid"].",NULL,0, '$title', '$diary', '{$picture}', '{$video}', $select, 0)";
        if(mysqli_query($link, $post)===TRUE){
            echo "Successfully";
        }else{
            echo "Error:".$post."<br>";
        }
    }

?>
<!DOCTYPE html>
<html lang="en" class="app">
<head>
    <meta charset="utf-8" />
    <title>Travelovers | Web Application</title>
    <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="js/jPlayer/jplayer.flat.css" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="css/animate.css" type="text/css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="css/simple-line-icons.css" type="text/css" />
    <link rel="stylesheet" href="css/font.css" type="text/css" />
    <link rel="stylesheet" href="css/app.css" type="text/css" />
</head>
<body class="bg-info dker">
<form method="POST" enctype="multipart/form-data">
    <div class="form-group pull-in clearfix" >
        <div class="col-sm-6">
            <label>Title</label>
            <input name="title" type="text" class="form-control" placeholder="Title">
        </div>
    </div>
    <div class="form-group">
        <label>Diary</label>
        <textarea name="diary" class="form-control" rows="5" placeholder="Type your diary"></textarea>
    </div>
    <div class="form-group">
        <label>Select picture to upload</label>
        <input name="picture" type="file" class="form-control" placeholder="Picture">
    </div>
    <div class="form-group">
        <label>Select video to upload</label>
        <input name="video" type="file" class="form-control" placeholder="Video">
    </div>
    <div class="form-group">
        <label>Choose who can see</label><br>
            <input type="radio" name = "visibility" value="3" checked> Public<br>
            <input type="radio" name = "visibility" value="2"> Show to FOF<br>
            <input type="radio" name = "visibility" value="1"> Show to friends<br>
            <input type="radio" name = "visibility" value="0"> Only I can see<br>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
</form>
<footer id="footer">
    <div class="text-center padder clearfix">
        <p>
            <small>NYU Tandon Computer Science<br>&copy; 2016</small>
        </p>
    </div>
</footer>
<!-- / footer -->
<script src="js/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.js"></script>
<!-- App -->
<script src="js/app.js"></script>
<script src="js/slimscroll/jquery.slimscroll.min.js"></script>
<script src="js/app.plugin.js"></script>
<script type="text/javascript" src="js/jPlayer/jquery.jplayer.min.js"></script>
<script type="text/javascript" src="js/jPlayer/add-on/jplayer.playlist.min.js"></script>
<script type="text/javascript" src="js/jPlayer/demo.js"></script>

<script type="text/javascript">
</script>

</body>
</html>
