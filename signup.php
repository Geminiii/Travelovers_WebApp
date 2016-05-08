<?php
	ini_set('display_errors', 'On');

	$link = mysqli_connect('localhost','root','root');
    if (!$link) {
        die('Could not connect: ' . mysql_error());
    }
	mysqli_select_db($link,'DB_Project1') or die( "Unable to select database");
    

	$email =$password =	$uname = $city = $birthdate = "";

	$unameErr = $emailErr = $passwordErr = "";

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["uname"])) {
		    $nameErr = "Username is required";
		} elseif (strlen($_POST["uname"])>15) {
			$unameErr = "Please enter an username less than 15 characters";
		} else {
		    $uname = $_POST["uname"];
		}

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

  		$city = $_POST["city"];
  		$birthdate = $_POST["birthdate"];
  		if (!($unameErr || $emailErr || $passwordErr || $unameErr )) {
  			$createNewUser = "INSERT INTO User(uid, password, uname, city, birthdate, signup_time, signup_email) VALUES (NULL, '$password', '$uname','$city', '$birthdate', NULL, '$email')";
	    	if (mysqli_query($link, $createNewUser) ===TRUE){

                $selectNewUid = "SELECT uid FROM User WHERE signup_email ='$email'";
                $result = $link->query($selectNewUid);
                $newUserUid = $result->fetch_array();

                $createUserProfile = "INSERT INTO Profile(uid, tel, biography, photo, visibility, last_signin) VALUES ('".$newUserUid[0]."', NULL, NULL, NULL, 3, CURRENT_TIMESTAMP )";
                mysqli_query($link, $createUserProfile);

            } else {
			    echo "Error10: " . $createNewUser . "<br>";
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
</head>
<body class="bg-info dker">
  <section id="content" class="m-t-lg wrapper-md animated fadeInDown">
    <div class="container aside-xl">
      <a class="navbar-brand block" href="index.html"><span class="h1 font-bold">Travelovers</span></a>
      <section class="m-b-lg">
        <header class="wrapper text-center">
          <strong>Sign up to find interesting thing</strong>
        </header>
        <form id = "signup" method = "POST">
          <div class="form-group">
            <input name="email" type="email" placeholder="Email" class="form-control rounded input-lg text-center no-border">
            <span id="emailErr"><?php if ($emailErr) {
				echo "* $emailErr";}?></span>
          </div>
          <div class="form-group">
             <input name="password" type="password" placeholder="Password" class="form-control rounded input-lg text-center no-border">
             <span id="passwordErr"><?php if ($passwordErr) {
				echo "* $passwordErr";}?></span>
          </div>
          <div class="form-group">
             <input name="uname" type="text" placeholder="Username" class="form-control rounded input-lg text-center no-border">
             <span id="unameErr"><?php if ($unameErr) {
				echo "* $unameErr";}?></span>
          </div>
          <div class="form-group">
             <input name="city" type="text" placeholder="City" class="form-control rounded input-lg text-center no-border">
          </div>
          <div class="form-group">
             <input name="birthdate" type="text" placeholder="Birthday" onfocus="(this.type='date')" onfocusout="(this.type='text')" class="form-control rounded input-lg text-center no-border">
          </div>
          <div class="checkbox i-checks m-b">
            <label class="m-l">
              <input type="checkbox" checked=""><i></i> Agree the <a href="#">terms and policy</a>
            </label>
          </div>
          <button type="submit" class="btn btn-lg btn-warning lt b-white b-2x btn-block btn-rounded"
          ><i class="icon-arrow-right pull-right"></i><span class="m-r-n-lg">Sign up</span></button>
          <div class="line line-dashed"></div>
          <p class="text-muted text-center"><small>Already have an account?</small></p>
          <a href="signin.php" class="btn btn-lg btn-info btn-block btn-rounded">Sign in</a>
        </form>
      </section>
    </div>
  </section>
  <!-- footer -->
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
