<?php
/**
 * Created by PhpStorm.
 * User: Li
 * Date: 4/30/16
 * Time: 3:04 PM
 */
session_start();

ini_set('display_errors', 'On');

include ('connectToDB.php');
$link = mysqli_connect('localhost','root','root');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
mysqli_select_db($link,'DB_Project1') or die( "Unable to select database");

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
        <form class="navbar-form navbar-left input-s-lg m-t m-l-n-xs hidden-xs" role="search">
            <div class="form-group">
                <div class="input-group">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-sm bg-white btn-icon rounded"><i class="fa fa-search"></i></button>
            </span>
                    <input type="text" class="form-control input-sm no-border rounded" placeholder="Search songs, albums...">
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
                            <div class="panel-heading b-light bg-light">
                                <strong>You have <span class="count">2</span> notifications</strong>
                            </div>
                            <div class="list-group list-group-alt">
                                <a href="#" class="media list-group-item">
                    <span class="pull-left thumb-sm">
                      <img src="images/a0.png" alt="..." class="img-circle">
                    </span>
                    <span class="media-body block m-b-none">
                      Use awesome animate.css<br>
                      <small class="text-muted">10 minutes ago</small>
                    </span>
                                </a>
                                <a href="#" class="media list-group-item">
                    <span class="media-body block m-b-none">
1.0 initial released<br>
                      <small class="text-muted">1 hour ago</small>
                    </span>
                                </a>
                            </div>
                            <div class="panel-footer text-sm">
                                <a href="#" class="pull-right"><i class="fa fa-cog"></i></a>
                                <a href="#notes" data-toggle="class:show animated fadeInRight">See all the notifications</a>
                            </div>
                        </section>
                    </section>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle bg clear" data-toggle="dropdown">
              <span class="thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm">
                <img src="images/a0.png" alt="...">
              </span>
                        John.Smith <b class="caret"></b>
                    </a>
                    
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
                                        <a href="genres.html">
                                            <i class="icon-music-tone-alt icon text-info"></i>
                                            <span class="font-bold">Genres</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="events.html">
                                            <i class="icon-drawer icon text-primary-lter"></i>
                                            <b class="badge bg-primary pull-right">6</b>
                                            <span class="font-bold">Activities</span>
                                        </a>
                                    </li>


                                    <li class="m-b hidden-nav-xs"></li>
                                </ul>
                                <ul class="nav" data-ride="collapse">


                                    <li >
                                        <a href="#" class="auto">
                        <span class="pull-right text-muted">
                          <i class="fa fa-angle-left text"></i>
                          <i class="fa fa-angle-down text-active"></i>
                        </span>
                                            <i class="icon-chemistry icon">
                                            </i>
                                            <span>UI Kit</span>
                                        </a>
                                        <ul class="nav dk text-sm">




                                            <li >
                                                <a href="timeline.html" class="auto">
                                                    <i class="fa fa-angle-right text-xs"></i>

                                                    <span>Timeline</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li >
                                        <a href="#" class="auto">
                        <span class="pull-right text-muted">
                          <i class="fa fa-angle-left text"></i>
                          <i class="fa fa-angle-down text-active"></i>
                        </span>
                                            <i class="icon-grid icon">
                                            </i>
                                            <span>Pages</span>
                                        </a>

                                    </li>
                                </ul>
                            </nav>
                            <!-- / nav -->
                        </div>
                    </section>

                    <footer class="footer hidden-xs no-padder text-center-nav-xs">
                        <div class="bg hidden-xs ">
                            <div class="dropdown dropup wrapper-sm clearfix">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <span class="thumb-sm avatar pull-left m-l-xs">
                        <img src="images/a3.png" class="dker" alt="...">
                        <i class="on b-black"></i>
                      </span>
                      <span class="hidden-nav-xs clear">
                        <span class="block m-l">
                          <strong class="font-bold text-lt">John.Smith</strong>
                          <b class="caret"></b>
                        </span>
                        <span class="text-muted text-xs block m-l">Art Director</span>
                      </span>
                                </a>
                                <ul class="dropdown-menu animated fadeInRight aside text-left">
                                    <li>
                                        <span class="arrow bottom hidden-nav-xs"></span>
                                        <a href="#">Settings</a>
                                    </li>
                                    <li>
                                        <a href="profile.html">Profile</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="badge bg-danger pull-right">3</span>
                                            Notifications
                                        </a>
                                    </li>
                                    <li>
                                        <a href="docs.html">Help</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="modal.lockme.html" data-toggle="ajaxModal" >Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>            </footer>
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

                                    <div class="cd-timeline-content">
<?php
$display = "SELECT uname, uid, ptime, lname, title, text, image, video FROM Post NATURAL JOIN Location NATURAL JOIN Profile NATURAL JOIN User WHERE pid= '$_GET[pid]';";
$result=mysqli_query($link, $display);
$res1=mysqli_fetch_assoc($result);
$image = base64_encode($res1['image']);
?>

                                        <h2><?php echo $res1['title'];?></h2>
                                        <br>
                                        <h5>by  <?php echo $res1['uname']." at ".$res1['ptime'];?></h5>
                                        <p><?php echo $res1['text'];?></p>
                                        <img class="r r-2x img-full" src='data:image/x-icon;base64, <?php echo $image;?>'/>

                                        <div class="line"></div>
                                        <article class="media m-t-none">
                                            <a class="pull-left thumb thumb-wrapper m-t-xs">
                                                <img src="images/m2.jpg">
                                            </a>
                                            <div class="media-body">
                                                <a href="#" class="font-semibold">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a>
                                                <div class="text-xs block m-t-xs"><a href="#">Design</a> 2 hours ago</div>
                                            </div>
                                        </article>

                                        <form action="comment.php" method="post">
                                            <div class="form-group">
                                                <label>Comment</label>
                                                <textarea class="form-control" rows="2" placeholder="Type your comment"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success">Submit comment</button>
                                            </div>
                                        </form>


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
                                    <li class="list-group-item">
                      <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
                        <img src="images/a1.png" alt="..." class="img-circle">
                        <i class="on b-light right sm"></i>
                      </span>
                                        <div class="clear">
                                            <div><a href="#">Chris Fox</a></div>
                                            <small class="text-muted">New York</small>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                      <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
                        <img src="images/a2.png" alt="...">
                        <i class="on b-light right sm"></i>
                      </span>
                                        <div class="clear">
                                            <div><a href="#">Amanda Conlan</a></div>
                                            <small class="text-muted">France</small>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                      <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
                        <img src="images/a3.png" alt="...">
                        <i class="busy b-light right sm"></i>
                      </span>
                                        <div class="clear">
                                            <div><a href="#">Dan Doorack</a></div>
                                            <small class="text-muted">Hamburg</small>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                      <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
                        <img src="images/a4.png" alt="...">
                        <i class="away b-light right sm"></i>
                      </span>
                                        <div class="clear">
                                            <div><a href="#">Lauren Taylor</a></div>
                                            <small class="text-muted">London</small>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                      <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
                        <img src="images/a5.png" alt="..." class="img-circle">
                        <i class="on b-light right sm"></i>
                      </span>
                                        <div class="clear">
                                            <div><a href="#">Chris Fox</a></div>
                                            <small class="text-muted">Milan</small>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                      <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
                        <img src="images/a6.png" alt="...">
                        <i class="on b-light right sm"></i>
                      </span>
                                        <div class="clear">
                                            <div><a href="#">Amanda Conlan</a></div>
                                            <small class="text-muted">Copenhagen</small>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                      <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
                        <img src="images/a7.png" alt="...">
                        <i class="busy b-light right sm"></i>
                      </span>
                                        <div class="clear">
                                            <div><a href="#">Dan Doorack</a></div>
                                            <small class="text-muted">Barcelona</small>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                      <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
                        <img src="images/a8.png" alt="...">
                        <i class="away b-light right sm"></i>
                      </span>
                                        <div class="clear">
                                            <div><a href="#">Lauren Taylor</a></div>
                                            <small class="text-muted">Tokyo</small>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                      <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
                        <img src="images/a9.png" alt="..." class="img-circle">
                        <i class="on b-light right sm"></i>
                      </span>
                                        <div class="clear">
                                            <div><a href="#">Chris Fox</a></div>
                                            <small class="text-muted">UK</small>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                      <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
                        <img src="images/a1.png" alt="...">
                        <i class="on b-light right sm"></i>
                      </span>
                                        <div class="clear">
                                            <div><a href="#">Amanda Conlan</a></div>
                                            <small class="text-muted">Africa</small>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                      <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
                        <img src="images/a2.png" alt="...">
                        <i class="busy b-light right sm"></i>
                      </span>
                                        <div class="clear">
                                            <div><a href="#">Dan Doorack</a></div>
                                            <small class="text-muted">Paris</small>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                      <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
                        <img src="images/a3.png" alt="...">
                        <i class="away b-light right sm"></i>
                      </span>
                                        <div class="clear">
                                            <div><a href="#">Lauren Taylor</a></div>
                                            <small class="text-muted">Brussels</small>
                                        </div>
                                    </li>
                                </ul>
                            </section>
                            <footer class="footer footer-md bg-black">
                                <form class="" role="search">
                                    <div class="form-group clearfix m-b-none">
                                        <div class="input-group m-t m-b">
                        <span class="input-group-btn">
                          <button type="submit" class="btn btn-sm bg-empty text-muted btn-icon"><i class="fa fa-search"></i></button>
                        </span>
                                            <input type="text" class="form-control input-sm text-white bg-empty b-b b-dark no-border" placeholder="Search members">
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
