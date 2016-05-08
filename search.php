<?php
/**
 * Created by PhpStorm.
 * User: Li
 * Date: 5/3/16
 * Time: 2:59 AM
 */
session_start();

ini_set('display_errors', 'On');

include ('connectToDB.php');
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
                <a href="home.php" class="navbar-brand text-lt">
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
                            $myself="SELECT uname FROM User WHERE uid= '$_SESSION[uid]'";
                            $res=mysqli_fetch_assoc(mysqli_query($link, $myself));
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
                                <a href="signin.php" data-toggle="ajaxModal" >Logout</a>
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
                                    <ul class="nav" data-ride="collapse">


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
                                                <h1 >Timeline</h1>
                                            </header>
                                            <div>
<?php
$entry=$_GET['search'];

$search = "SELECT uname, pid, uid, ptime, lname, title, text, image, video
FROM Post NATURAL JOIN Profile NATURAL JOIN User
WHERE uid IN (SELECT uid2 FROM Friendship WHERE uid1=$_SESSION[uid]) 
AND ptime >= last_signin
AND visibility > 0
AND (text LIKE '%$entry%'
OR title LIKE '%$entry%'
OR uname LIKE '%entry%')
ORDER BY ptime DESC;";

$result = mysqli_query($link, $search);
while($res1=mysqli_fetch_assoc($result)){
    //$image = $res1['image'];
    $_SESSION = $res1['pid'];
    $pid = $res1['pid'];
    echo '<div class="cd-timeline-block">';
    echo '<div class="cd-timeline-img cd-picture"><img src="images/cd-icon-picture.svg" alt="Picture"></div>';
    echo '<div class="cd-timeline-content">';
    echo "<h2>$res1[title]</h2><br>";
    echo "<h5>by  $res1[uname]</h5>";
    echo "<p>$res1[text]</p>";
    $image = base64_encode($res1['image']);
    echo "<img class=\"r r-2x img-full\" src='data:image/x-icon;base64, $image'/>";
    echo '<a href=\display.php?pid='.$pid.' class="cd-read-more">Read more</a>';
    echo "<span class='cd-date'>$res1[ptime]</span></div></div>";}
?>

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