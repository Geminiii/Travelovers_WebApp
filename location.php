<?php
#session_start();
include "connectToDB.php";

$uid = $_SESSION["uid"];

/*these lines for modified previous location table
$query = "CREATE TABLE IF NOT EXISTS Location (
  lid int AUTO_INCREMENT,
  PRIMARY KEY (lid),
      lid int, 
  	  lat decimal (5,3),
      lng decimal (6,3),
      lname varchar(20),
      uid int
  );";

  */
//through lat and lng to create location

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
		if(!is_null($row["lname"])){
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
}


?>
<!DOCTYPE html>
<html>
<head>
  <!--link href="../styles.min.css" rel="stylesheet"-->
  <title>PIN a Location</title>
  <style>
    #map-search { position: absolute; top: 10px; left: 10px; right: 10px; }
    #search-txt { float: left; width: 25%; }
    #search-btn { float: left; width: 15%; }
    #detect-btn { float: left; width: 15%; }
    #input-info {position: relative; top: 45px; left: 10px; right: 10px;}
    #submit-btn{width: 15%;}
    #map-canvas { position: relative;top: 80px; bottom: 65px; left: 10px; right: 10px; }
    #map-output { position: absolute;bottom: 10px; left: 10px; right: 10px; }
    #map-output a { position:absolute;bottom: 10px; left: 10px; right: 10px; right; }
    #submit-btn{float:left; bottom: 10px; left: 30px; right: 10px;}
  </style>
</head>
<body>
  <div id="map-search">
    <input id="search-txt" type="text" value="348, 61st, Brooklyn, NY 11220 USA" maxlength="100">
    <input id="search-btn" type="button" value="Locate Address">
    <input id="detect-btn" type="button" value="Detect Location" disabled>
  </div>
  <div id="input-info">
  	<form action = "location.php" method="post" name="myform">
  	<input id="search-txt" type="hidden" placeholder="Name this new location" name="loname" maxlength="100">
  	<input id="submit-btn" type="hidden" value="PIN this Location">
  	<!--input type="hidden" name="lati"-->
  	<input type="hidden" name="long" >
    <input type="hidden" name="lname">
  	</form>
  </div>
  <div id="map-canvas" style="height:300px;width:350px"></div>
  <div id="map-output"></div>
  <div></div>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <script type="text/javascript">
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
  </script>
  <script src="https://maps.googleapis.com/maps/api/js? v=3&amp;sensor=false&amp;key=AIzaSyAv0lkA20J7N5lSHwS4mjklob4wUBajWL8&amp;callback=loadmap" defer ></script>
</body>
</html>