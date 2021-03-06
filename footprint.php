<?php
session_start();
include "connectToDB.php";

$uid = $_SESSION['uid'];
$lid = $lat = $lng = $lname= "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $lat = $_POST["lati"];
    $lng = $_POST["long"];
    $lname = $_POST["loname"];
    $locationQuery = "INSERT INTO Location(lid, luid, lat, lng, lname) VALUES(NULL,'$uid','$lat','$lng', '$lname')";
    $search = "SELECT lname FROM Location WHERE lat = '$lat' AND lng = '$lng'";

    $searchResult = mysqli_query($link, $search);
    if ($searchResult ){
        $row = $searchResult->fetch_assoc();
        if(!$row["lname"]){
            $message = 'This location has been pined by others named '.$row['lname'];
            print '<script type="text/javascript">';
            print 'alert("Error: '. $message.' .Please try another one")';
            print '</script>';
        }else{
            if(mysqli_query($link, $locationQuery)===TRUE){
                print '<script type="text/javascript">';
                print 'alert("Congratulation! This Location has been named '.$lname.' by you.")';
                print '</script>';
            }else{
                echo "Error:".$locationQuery."<br>";
            }
        }
    }else{
        echo "Failed";
    }

    $sth="SELECT lat,lng FROM Location WHERE luid='$uid';";

    $locations = mysqli_fetch_assoc(mysqli_query($link,$sth));

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
            <a href="home.php" class="navbar-brand text-lt">
                <i class="fa fa-globe"></i>
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
                    <a href=" " class="dropdown-toggle lt" data-toggle="dropdown">
                        <i class="icon-bell"></i>
                        <?php
                        $requestCount = 0;
                        $request = "SELECT uid1,uname from Friendship, User where Friendship.uid1 = user.uid and uid2 = $_SESSION[uid] and status = 0;";
                        $result = mysqli_query($link, $request);
                        while($res1=mysqli_fetch_assoc($result)){
                            $requestCount++;
                        }
                        ?>
                        <span class="badge badge-sm up bg-danger count"><?php echo $requestCount; ?></span>
                    </a >
                    <section class="dropdown-menu aside-xl animated fadeInUp">
                        <section class="panel bg-white">
                            <div class="panel-heading b-light bg-light">

                                <strong>You have <span class="count" style="display: inline;"><?php echo $requestCount; ?></span> friend requests</strong>
                            </div>
                            <div class="list-group list-group-alt">
                                <?php
                                // get number of friend request
                                $result = mysqli_query($link, $request);
                                if($result){
                                    while($res2=mysqli_fetch_assoc($result)){

                                        echo '<div class="media list-group-item" style="display: block;">';
                                        echo '<span class="pull-left thumb-sm text-center col-sm-3">
                              <i class=" icon-user-follow i-lg"></i>
                          </span>';
                                        echo '<span class="media-body block m-b-none col-sm-7">'.$res2['uname'].' wants to be your friend &nbsp</span>
                            <div class="col-sm-1"><form action = "acceptFriendRequest.php" method = "POST"><button type="submit" name="accept" value="'.$res2['uid1'].'" ><i class="icon-check"></i></button></form></div>
                            <div class="col-sm-1"><form action = "declineFriendRequest.php" method = "POST"><button type="submit" name="decline" value="'.$res2['uid1'].'" ><i class="icon-close"></i></button></form></div>';
                                        echo '</div>';
                                    }
                                }
                                ?>
                            </div>

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
                            <a href="signin.php" >Logout</a>
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
                                    <li>
                                        <a href="footprint.php">
                                            <i class="icon-pin icon text-primary-lter"></i>
                                            <span class="font-bold">Foot Print</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="addFriend.php">
                                            <i class="icon-user icon text-primary-lter"></i>
                                            <span class="font-bold">New Friend</span>
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
                                    <div id="map-search">
                                        <input id="search-txt" type="text" value="348, 61st, Brooklyn, NY 11220 USA" maxlength="100"><br><br>
                                        <input id="search-btn" type="button" value="Locate Address">
                                        <input id="detect-btn" type="button" value="Detect Location" disabled>
                                    </div><br>
                                    <div id="input-info">
                                        <form action = "footprint.php" method="post" name="myform">
                                            <input id="search-txt" type="TEXT" placeholder="Name this new location" name="loname" maxlength="100"><br><br>
                                            <input id="submit-btn" type="submit" value="PIN this Location">
                                            <input type="hidden" name="lati">
                                            <input type="hidden" name="long" >

                                        </form><br>
                                    </div>
                                    <div id="map-canvas" style="height:300px;width:350px"></div>
                                    <div id="map-output"></div>
                                    <div></div>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>

                                    <script type="text/javascript">


                                        <?php foreach($locations as $location){ ?>
                                        var location = new google.maps.LatLng(<?php echo $location['lat']; ?>, <?php echo $location['lng']; ?>);
                                        var marker = new google.maps.Marker({
                                            position: location,
                                            map: map
                                        });
                                        <?php } ?>

                                        function loadmap() {
                                            // initialize map
                                            var map = new google.maps.Map(document.getElementById("map-canvas"), {
                                                center: new google.maps.LatLng(40.641, -74.020),
                                                zoom: 17,
                                                mapTypeId: google.maps.MapTypeId.ROADMAP
                                            });
                                            // initialize marker
                                            var marker = new google.maps.Marker({
                                                position: map.getCenter(),
                                                draggable: true,
                                                map: map
                                            });

                                            // intercept map and marker movements
                                            google.maps.event.addListener(map, "idle", function() {
                                                marker.setPosition(map.getCenter());
                                                //document.getElementById("map-output").innerHTML = "Latitude:  " + map.getCenter().lat().toFixed(6) + "<br>Longitude: " + map.getCenter().lng().toFixed(6) + "<br>Zoom:" + map.getZoom() ;
                                                document.myform.lati.value =  map.getCenter().lat().toFixed(4);
                                                document.myform.long.value =  map.getCenter().lng().toFixed(4);
                                                //console.log(map.getCenter().results[1]);
                                            });

                                            google.maps.event.addListener(marker, "dragend", function(mapEvent) {
                                                map.panTo(mapEvent.latLng);
                                            });

                                            // initialize geocoder
                                            var geocoder = new google.maps.Geocoder();
                                            google.maps.event.addDomListener(document.getElementById("search-btn"), "click", function() {
                                                geocoder.geocode({ address: document.getElementById("search-txt").value }, function(results, status) {
                                                    if (status == google.maps.GeocoderStatus.OK) {
                                                        var result = results[0];
                                                        document.getElementById("search-txt").value = result.formatted_address;
                                                        document.myform.lname.value = result.formatted_address;
                                                        if (result.geometry.viewport) {
                                                            map.fitBounds(result.geometry.viewport);
                                                        } else {
                                                            map.setCenter(result.geometry.location);
                                                        }
                                                    } else if (status == google.maps.GeocoderStatus.ZERO_RESULTS) {
                                                        alert("Sorry, geocoder API failed to locate the address.");
                                                    } else {
                                                        alert("Sorry, geocoder API failed with an error.");
                                                    }
                                                });
                                            });
                                            google.maps.event.addDomListener(document.getElementById("search-txt"), "keydown", function(domEvent) {
                                                if (domEvent.which === 13 || domEvent.keyCode === 13) {
                                                    google.maps.event.trigger(document.getElementById("search-btn"), "click");
                                                }
                                            });

                                            // initialize geolocation
                                            if (navigator.geolocation) {
                                                google.maps.event.addDomListener(document.getElementById("detect-btn"), "click", function() {
                                                    navigator.geolocation.getCurrentPosition(function(position) {
                                                        map.setCenter(new google.maps.LatLng(position.coords.latitude, position.coords.longitude));
                                                    }, function() {
                                                        alert("Sorry, geolocation API failed to detect your location.");
                                                    });
                                                });
                                                document.getElementById("detect-btn").disabled = false;
                                            }
                                        }

                                    </script>

                                    <script src="https://maps.googleapis.com/maps/api/js? v=3&amp;sensor=false&amp;key=AIzaSyAv0lkA20J7N5lSHwS4mjklob4wUBajWL8&amp;callback=loadmap" defer ></script>




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
<!--script src="js/app.plugin.js"></script-->

<script type="text/javascript" src="js/jPlayer/jquery.jplayer.min.js"></script>
<script type="text/javascript" src="js/jPlayer/add-on/jplayer.playlist.min.js"></script>
<script type="text/javascript" src="js/jPlayer/demo.js"></script>

</body>
</html>