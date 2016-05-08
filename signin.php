<?php

session_start();

ini_set('display_errors', 'On');

$link = mysqli_connect('localhost','root','root');
if (!$link) {
  die('Could not connect: ' . mysql_error());
}
mysqli_select_db($link,'DB_Project1') or die( "Unable to select database");


$email =$password = "";
$emailErr = $passwordErr = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = $_POST["email"];
  }
  if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
  } else {
    $password = $_POST["password"];
  }

  if (!($emailErr || $passwordErr )) {
    $checkSignin = "SELECT * FROM User WHERE signup_email = '$email' AND password ='$password' ";
    $signInRes = mysqli_query($link, $checkSignin);
    $row = mysqli_fetch_array($signInRes);
    $uid = $row["uid"];


    if ($row){
      $_SESSION["uid"] = $row["uid"];
      header("Location: ./home.php");
    } else {
      echo "Error: " . $checkSignin . "<br>";
    }
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
    <!--[if lt IE 9]>
    <script src="js/ie/html5shiv.js"></script>
    <script src="js/ie/respond.min.js"></script>
    <script src="js/ie/excanvas.js"></script>
  <![endif]-->
</head>
<body class="bg-info dker">
  <section id="content" class="m-t-lg wrapper-md animated fadeInUp">    
    <div class="container aside-xl">
      <a class="navbar-brand block" href="home.php"><span class="h1 font-bold">Travelovers</span></a>
      <section class="m-b-lg">
        <header class="wrapper text-center">
          <strong>Sign in to get in touch</strong>
        </header>
        <form method="post">
          <div class="form-group">
            <input type="email" name="email" placeholder="Email" class="form-control rounded input-lg text-center no-border">
            <span id="emailErr"><?php if ($emailErr) {
                echo "* $emailErr";}?></span>
          </div>
          <div class="form-group">
             <input type="password" name="password" placeholder="Password" class="form-control rounded input-lg text-center no-border">
            <span id="passwordErr"><?php if ($passwordErr) {
                echo "* $passwordErr";}?></span>
          </div>
          <button type="submit" class="btn btn-lg btn-warning lt b-white b-2x btn-block btn-rounded"><i class="icon-arrow-right pull-right"></i><span class="m-r-n-lg">Sign in</span></button>
          <div class="text-center m-t m-b"><a href="#"><small>Forgot password?</small></a></div>
          <div class="line line-dashed"></div>
          <p class="text-muted text-center"><small>Do not have an account?</small></p>
          <a href="signup.php" class="btn btn-lg btn-info btn-block rounded">Create an account</a>
        </form>
      </section>
    </div>
  </section>
  <!-- footer -->
  <footer id="footer">
    <div class="text-center padder">
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

</body>
</html>