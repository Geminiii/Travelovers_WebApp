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
    <title>Travelovers | Homepage</title>
    <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="js/jPlayer/jplayer.flat.css" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="css/animate.css" type="text/css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="css/simple-line-icons.css" type="text/css" />
    <link rel="stylesheet" href="css/font.css" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.2.6/css/simple-line-icons.css">
    <link rel="stylesheet" href="css/app.css" type="text/css" />

    <link href='http://fonts.googleapis.com/css?family=Droid+Serif|Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
    <link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
    <script src="js/modernizr.js"></script> <!-- Modernizr -->

    <!--[if lt IE 9]>
    <script src="js/ie/html5shiv.js"></script>
    <script src="js/ie/respond.min.js"></script>
    <script src="js/ie/excanvas.js"></script>
    <![endif]-->
</head>
<body class="">
<section class="vbox">
    <header class="bg-white-only header header-md navbar navbar-fixed-top-xs">
        <div class="navbar-header aside bg-info nav-xs">
            <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html">
                <i class="icon-list"></i>
            </a>
            <a href="index.html" class="navbar-brand text-lt">
                <i class="icon-earphones"></i>
                <img src="images/logo.png" alt="." class="hide">
                <span class="hidden-nav-xs m-l-sm">Travelovers</span>
            </a>
            <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user">
                <i class="icon-settings"></i>
            </a>
        </div>      <ul class="nav navbar-nav hidden-xs">
            <li>
                <a href="#nav,.navbar-header" data-toggle="class:nav-xs,nav-xs" class="text-muted">
                    <i class="fa fa-indent text"></i>
                    <i class="fa fa-dedent text-active"></i>
                </a>
            </li>
        </ul>


        <form action="search.php" class="navbar-form navbar-left input-s-lg m-t m-l-n-xs hidden-xs" role="search">
            <div class="form-group">
                <div class="input-group">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-sm bg-white btn-icon rounded"><i class="fa fa-search"></i></button>
            </span>
                    <input name="search" type="text" class="form-control input-sm no-border rounded" placeholder="Search diaries, activities...">
                </div>
            </div>
        </form>



        <div class="navbar-right ">
            <ul class="nav navbar-nav m-n hidden-xs nav-user user">
                <li class="hidden-xs">
                    <a href="#" class="dropdown-toggle lt" data-toggle="dropdown">
                        <i class="icon-bell"></i>
                        <span class="badge badge-sm up bg-danger count">2</span>
                    </a>
                    <section class="dropdown-menu aside-xl animated fadeInUp">
                        <section class="panel bg-white">

                        </section>
                    </section>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle bg clear" data-toggle="dropdown">
              <span class="thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm">
                <img src="images/a0.png" alt="...">
              </span>
                        <?php
                        $myself="SELECT uname FROM User WHERE uid= $_SESSION[uid]";
                        $res=mysqli_fetch_assoc(mysqli_query($conn, $myself));
                        echo $res['uname'];
                        ?>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight">
                        <li>
                            <span class="arrow top"></span>
                            <a href="#">Settings</a>
                        </li>
                        <li>
                            <a href="myProfile.php">Profile</a>
                        </li>

                        <li class="divider"></li>
                        <li>
                            <a href="modal.lockme.html" data-toggle="ajaxModal" >Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </header>
    <section>
        <section class="hbox stretch">
            <!-- .aside -->
            <aside class="bg-black dk nav-xs aside hidden-print" id="nav">
                <section class="vbox">
                    <section class="w-f-md scrollable">
                        <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">



                            <!-- nav -->
                            <nav class="nav-primary hidden-xs">
                                <ul class="nav bg clearfix">
                                    <li class="hidden-nav-xs padder m-t m-b-sm text-xs text-muted">
                                        Discover
                                    </li>
                                    <li>
                                        <a href="home.php">
                                            <i class="icon-disc icon text-success"></i>
                                            <span class="font-bold">What's new</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="myProfile.php">
                                            <i class="icon-notebook icon text-info"></i>
                                            <span class="font-bold">Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="post.php">
                                            <i class="icon-pencil icon text-info"></i>
                                            <span class="font-bold">Post Diary</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="postActivities.php">
                                            <i class="icon-drawer icon text-primary-lter"></i>
                                            <span class="font-bold">Post Activity</span>
                                        </a>
                                    </li>


                                    <li class="m-b hidden-nav-xs"></li>
                                </ul>
                            </nav>
                            <!-- / nav -->
                        </div>
                    </section>

                </section>
            </aside>
            <!-- /.aside -->
            <section id="content">
                <section class="hbox stretch">
                    <section>
                        <section class="vbox"><section class="scrollable padder-lg w-f-md" id="bjax-target">
                                <a href="#" class="pull-right text-muted m-t-lg" data-toggle="class:fa-spin" ><i class="icon-refresh i-lg  inline" id="refresh"></i></a>
                                <h2 class="font-thin m-b">Discover <span class="musicbar animate inline m-l-sm" style="width:20px;height:20px">
                    <span class="bar1 a1 bg-primary lter"></span>
                    <span class="bar2 a2 bg-info lt"></span>
                    <span class="bar3 a3 bg-success"></span>
                    <span class="bar4 a4 bg-warning dk"></span>
                    <span class="bar5 a5 bg-danger dker"></span>
                  </span></h2>
                                <div class="row row-sm">
                                    <section>
                                        <header height="300px" line-height="200px" text-align="center" background="#303e49">
                                            <h1 >Profile</h1>
                                        </header><br>
                                        <div>


<form method="POST" action = "editProfile.php" enctype="multipart/form-data">

    <div class="form-group pull-in clearfix" >
        <div class = "row">
            <div class="col-sm-6" style = "padding-left:33px;">
                <label>Your Name:</label>
                <p style = "font-weight:bold; "><?php echo $uname;?></p>
            </div>
            <div class="col-sm-6" bir>
                <label>Your Birthdate:</label>
                <p style = "font-weight:bold; "><?php echo $birthdate;?></p>
            </div>
        </div><br>

        <div class = "row">
            <div class="col-sm-6" style = "padding-left:33px;">
                <label>SignUp Time:</label>
                <p style = "font-weight:bold; "><?php echo $signup_time;?></p>
            </div>
            <div class="col-sm-6" bir>
                <label>Last SignIn Time:</label>
                <p style = "font-weight:bold; "><?php echo $last_signin;?></p>
            </div>
        </div><br>

        <div class = "row">
            <div class="col-sm-6" style = "padding-left:33px;">
                <label>Your Email:</label>
                <p style = "font-weight:bold; "><?php echo $signup_email;?></p>
            </div>
            <div class="col-sm-3" bir>
                <label>Telephone:</label>
                <input name="tel" type="text" class="form-control" value="<?php echo $tel?>">
            </div>
        </div><br>

        <div class = "row">
            <div class="col-sm-6" style = "padding-left:33px;">
                <label>Biography:</label>
                <textarea name="biography" class="form-control" rows="2"><?php echo $biography?></textarea>
            </div>
            <div class="col-sm-3" bir>
                <label>Your Location:</label>
                <input name="city" type="text" class="form-control" value="<?php echo $city ?>">
            </div>
        </div><br>

        <div class = "row" style = "padding-left:33px">
            <div class="col-sm-3" bir>
                <img src="data:image/jpeg;base64,<?php echo base64_encode($photo) ?>" class="img-rounded" alt="Cinque Terre" width="304" height="236"/>
                <br><label>Select photo to upload</label><br>
                <input name="photo" type="file" class="form-control">
                <br>
            </div>
        </div>
        <div class = "row" style = "padding-left:33px">
            <label>Choose who can see</label><br>
            <input type="radio" name = "visibility" value="3" <?php echo ($visibility == "3") ? 'checked="checked"' : ''; ?>> Public<br>
            <input type="radio" name = "visibility" value="2" <?php echo ($visibility == "2") ? 'checked="checked"' : ''; ?>> Show to FOF<br>
            <input type="radio" name = "visibility" value="1"<?php echo ($visibility == "1") ? 'checked="checked"' : ''; ?>> Show to friends<br>
            <input type="radio" name = "visibility" value="0"<?php echo ($visibility == "0") ? 'checked="checked"' : ''; ?>> Only I can see<br>
        </div>
    </div>
    <div class="form-group" style= "padding-left:33px">
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
</form>
                                    </section>



                                </div>
                                <div class="row">


                                </div>
                                <div class="row m-t-lg m-b-lg">
                                    <div class="col-sm-6">
                                        <div class="bg-primary wrapper-md r">

                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="bg-black wrapper-md r">

                                        </div>
                                    </div>
                                </div>
                            </section>

                            <!A footer is deleted here>

                        </section>
                    </section>
                    <!-- side content -->
                    <aside class="aside-md bg-light dk" id="sidebar">
                        <section class="vbox animated fadeInRight">
                            <section class="w-f-md scrollable hover">
                                <h4 class="font-thin m-l-md m-t">Connected</h4>
                                <ul class="list-group no-bg no-borders auto m-t-n-xxs">
                                    <?php
                                    if($_SERVER["REQUEST_METHOD"] == "POST") {
                                        $searchMem = $_POST['searchMem'];
                                        if ($searchMem) {
                                            $friendList = "SELECT uname, city FROM User, Friendship WHERE uid2=$_SESSION[uid] AND status=1 AND uid1=uid AND Uname LIKE '%$searchMem%'";
                                        }else {
                                            $friendList = "SELECT uname, city FROM User, Friendship WHERE uid2=$_SESSION[uid] AND status=1 AND uid1=uid";
                                        }
                                    }else {
                                        $friendList = "SELECT uname, city FROM User, Friendship WHERE uid2=$_SESSION[uid] AND status=1 AND uid1=uid";
                                    }
                                    $result = mysqli_query($conn, $friendList);
                                    while ($res1 = mysqli_fetch_assoc($result)) {
                                        echo "<li class=\"list-group-item\">
                      <span class=\"pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm\">
                        <img src=\"images/a1.png\" alt=\"...\" class=\"img-circle\">
                        <i class=\"on b-light right sm\"></i>
                      </span>
                      <div class=\"clear\">
                        <div><a href=\"#\">$res1[uname]</a></div>
                        <small class=\"text-muted\">$res1[city]</small>
                      </div>
                    </li>";

                                    }
                                    ?>


                                </ul>
                            </section>
                            <footer class="footer footer-md bg-black">
                                <form method="post" action="home.php" class="" role="search">
                                    <div class="form-group clearfix m-b-none">
                                        <div class="input-group m-t m-b">
                        <span class="input-group-btn">
                          <button  type="submit" class="btn btn-sm bg-empty text-muted btn-icon"><i class="fa fa-search"></i></button>
                        </span>
                                            <input name="searchMem" type="text" class="form-control input-sm text-white bg-empty b-b b-dark no-border" placeholder="Search members">
                                        </div>
                                    </div>
                                </form>
                            </footer>
                        </section>
                    </aside>
                    <!-- / side content -->
                </section>
                <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
            </section>
        </section>
    </section>
</section>
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