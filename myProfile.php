<?php
session_start();
include "connection.php";
$tel = $biography = $photo = $visibility = $last_signin='';
$uname = $city = $birthdate = $signup_time = $signup_email ='';
$uid = $_SESSION['uid'];
if(!isset($_SESSION['uid'])){
    echo 'Please login first';
    header("Location: signin.php");
} else{
    //show the current information of user
    if ($stmt = $mysqli->prepare("select uname, city, birthdate,  signup_time, signup_email from User where uid=?")){
        $stmt->bind_param("i", $uid);
        $stmt->execute();
        $stmt->bind_result($uname,$city,$birthdate, $signup_time, $signup_email);
        if ( $stmt->fetch())
        {
        }
        $stmt->close();
    }
    if ($stmt = $mysqli->prepare("select tel, biography, photo, visibility, last_signin from Profile where uid=?")){
        $stmt->bind_param("i", $uid);
        $stmt->execute();
        $stmt->bind_result($tel, $biography, $photo, $visibility, $last_signin);
        if ($stmt->fetch())
        {
        }
        $stmt->close();
    }

}
?>
<!DOCTYPE html>
<html lang="en" class="app">
<head>
    <meta charset="utf-8" />
    <title>My Profile</title>
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
<body class="bg-info dker" style = "padding-left:40px; padding-right:60px;">
<?php 
//session_start();
$_SESSION['uid'] = 1; //DO NOT FORGET TO DELETE!!!!?>

<form method="POST" action = "editProfile.php" enctype="multipart/form-data">

    <div class="form-group pull-in clearfix" >
        <div class = "row">
            <div class="col-sm-6" style = "padding-left:33px;">
                <label>Your Name</label>
                <p style = "font-weight:bold; "><?php echo $uname;?></p>
            </div>
            <div class="col-sm-6" bir>
                <label>Your Birthdate</label>
                <p style = "font-weight:bold; "><?php echo $birthdate;?></p>
            </div>
        </div>

        <div class = "row">
            <div class="col-sm-6" style = "padding-left:33px;">
                <label>SignUp Time</label>
                <p style = "font-weight:bold; "><?php echo $signup_time;?></p>
            </div>
            <div class="col-sm-6" bir>
                <label>Last SignIn Time</label>
                <p style = "font-weight:bold; "><?php echo $last_signin;?></p>
            </div>
        </div>

        <div class = "row">
            <div class="col-sm-6" style = "padding-left:33px;">
                <label>Your Email</label>
                <p style = "font-weight:bold; "><?php echo $signup_email;?></p>
            </div>
            <div class="col-sm-3" bir>
                <label>Telephone</label>
                <input name="tel" type="text" class="form-control" value="<?php echo $tel?>">
            </div>
        </div>

        <div class = "row">
            <div class="col-sm-6" style = "padding-left:33px;">
                <label>Biography</label>
                <textarea name="biography" class="form-control" rows="5"><?php echo $biography?></textarea>
            </div>
            <div class="col-sm-3" bir>
                <label>Your Location</label>
                <input name="city" type="text" class="form-control" value="<?php echo $city ?>">
            </div>
        </div>

        <div class = "row">
            <div class="col-sm-6" style = "padding-left:33px;">
                <label>Choose who can see</label><br>
                <input type="radio" name = "visibility" value="3" <?php echo ($visibility == "3") ? 'checked="checked"' : ''; ?>> Public<br>
                <input type="radio" name = "visibility" value="2" <?php echo ($visibility == "2") ? 'checked="checked"' : ''; ?>> Show to FOF<br>
                <input type="radio" name = "visibility" value="1"<?php echo ($visibility == "1") ? 'checked="checked"' : ''; ?>> Show to friends<br>
                <input type="radio" name = "visibility" value="0"<?php echo ($visibility == "0") ? 'checked="checked"' : ''; ?>> Only I can see<br>
            </div>
            <div class="col-sm-6" bir>
                <img src="data:image/jpeg;base64,<?php echo base64_encode($photo) ?>" class="img-rounded" alt="Cinque Terre" width="304" height="236"/>
                <label>Select photo to upload</label>
                <input name="photo" type="file" class="form-control">
            </div>
        </div>
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