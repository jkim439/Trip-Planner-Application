<?php
/*
	Trip Planner Project

	Developer: Junghwan Kim (Junghwan_Kim@student.uml.edu), Rotana Nou (Rotana_Nou@student.uml.edu)
	Affiliation: University of Massachusetts Lowell: COMP.4610 GUI PROGRAMMING II

	Date: 05/02/2017
	Reference: w3schools.com, googlemapi.com, tripadvisor.com

	Copyright © 2017 Junghwan Kim, Rotana Nou. All rights reserved.
*/
include "mysqli.php";

if($_SERVER['REQUEST_METHOD'] !== "POST") {
	echo "<script>alert(\"Your connect is incorrect.\");location.href=\"planner1.php\";</script>";
	exit;
}

$city = $places = $transportation = $sort = "";
$city = $mysqli->real_escape_string($_POST['city']);
$places = $mysqli->real_escape_string($_POST['places']);
$type0 = $mysqli->real_escape_string($_POST['type0']);
$type1 = $mysqli->real_escape_string($_POST['type1']);
$type2 = $mysqli->real_escape_string($_POST['type2']);
$type3 = $mysqli->real_escape_string($_POST['type3']);
$type4 = $mysqli->real_escape_string($_POST['type4']);
$type5 = $mysqli->real_escape_string($_POST['type5']);
$type6 = $mysqli->real_escape_string($_POST['type6']);
$type7 = $mysqli->real_escape_string($_POST['type7']);
$type8 = $mysqli->real_escape_string($_POST['type8']);
$type9 = $mysqli->real_escape_string($_POST['type9']);
$type10 = $mysqli->real_escape_string($_POST['type10']);
$transportation = $mysqli->real_escape_string($_POST['transportation']);
$sort = $mysqli->real_escape_string($_POST['sort']);

if($city !== "0" && $city !== "1" && $city !== "2" && $city !== "3" && $city !== "4" && $city !== "5") {
	echo "<script>alert(\"Please select city.\");history.back();</script>";
	exit;
}
if($places != "3" && $places != "4" && $places != "5" && $places != "6") {
	echo "<script>alert(\"Please select places.\");history.back();</script>";
	exit;
}

if($transportation != "DRIVING" && $transportation != "WALKING" && $transportation != "BICYCLING") {
	echo "<script>alert(\"Please select transportation.\");history.back();</script>";
	exit;
}
if($sort != "y" && $sort != "rating") {
	echo "<script>alert(\"Please select sort.\");history.back();</script>";
	exit;
}

if($city === "0") $cityName = "Boston";
if($city === "1") $cityName = "Miami";
if($city === "2") $cityName = "New York";
if($city === "3") $cityName = "Washington";
if($city === "4") $cityName = "Chicago";
if($city === "5") $cityName = "Los Angeles";

if($type0 !== "0") $type0 = "11";
if($type1 !== "1") $type1 = "11";
if($type2 !== "2") $type2 = "11";
if($type3 !== "3") $type3 = "11";
if($type4 !== "4") $type4 = "11";
if($type5 !== "5") $type5 = "11";
if($type6 !== "6") $type6 = "11";
if($type7 !== "7") $type7 = "11";
if($type8 !== "8") $type8 = "11";
if($type9 !== "9") $type9 = "11";
if($type10 !== "10") $type10 = "11";

$query = mysqli_query($mysqli, "SELECT * FROM `places` WHERE `city` = '$city' AND (`type` = '$type0' OR `type` = '$type1' OR `type` = '$type2' OR `type` = '$type3' OR `type` = '$type4' OR `type` = '$type5' OR `type` = '$type6' OR `type` = '$type7' OR `type` = '$type8' OR `type` = '$type9' OR `type` = '$type10') ORDER BY $sort DESC LIMIT 0, $places");
if(mysqli_num_rows($query) != $places) {
	echo "<script>alert(\"The requested path was not found. Please try it the other way.\");history.back();</script>";
	exit;
}
$place = array();
while ($row = mysqli_fetch_array($query)) {
	$place[] = $row;
}

srand(time());
$code = rand(100000,999999);
$time = date('Y-m-d H:i:s');
$ip = $_SERVER['REMOTE_ADDR'];
mysqli_query($mysqli, "INSERT INTO `trips` (`no`, `code`, `time`, `ip`, `city`, `places`, `type0`, `type1`, `type2`, `type3`, `type4`, `type5`, `type6`, `type7`, `type8`, `type9`, `type10`, `transportation`, `sort`) VALUES (NULL, '$code', '$time', '$ip', '$city', '$places', '$type0', '$type1', '$type2', '$type3', '$type4', '$type5', '$type6', '$type7', '$type8', '$type9', '$type10', '$transportation', '$sort')");
?>
<!--
	Trip Planner Project

	Developer: Junghwan Kim (Junghwan_Kim@student.uml.edu), Rotana Nou (Rotana_Nou@student.uml.edu)
	Affiliation: University of Massachusetts Lowell: COMP.4610 GUI PROGRAMMING II

	Date: 05/02/2017
	Reference: w3schools.com, googlemapi.com, tripadvisor.com

	Copyright © 2017 Junghwan Kim, Rotana Nou. All rights reserved.
 -->
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
		<meta charset="utf-8">
		<link rel="icon" href="img/favicon.png">
		<title>Trip Planner</title>
		<link rel="stylesheet" href="css/planner.css">
		<script type="text/javascript" src="js/planner.js"></script>
	</head>
	<body>
		<nav>
			<ul>
				<li><a href="javascript:history.back();" class="active">Plan again</a></li>
				<li id="saveMenu"><a href="javascript:save();">Save this trip</a></li>
				<li><a href="javascript:window.print();">Print</a></li>
				<li><a href="javascript:exit();" class="warning">Exit</a></li>
			</ul>
		</nav>
		<div class="overlay" id="overlay">
			<br><br><h1>Processing user mail request</h1><br><br><br>
			<img src="img/loading.gif" alt="loading">
		</div>
		<div id="map_canvas" class="left"></div>
		<div class="right">
			<div class="navMargin"></div>
			<h2>Your <?php echo htmlspecialchars($cityName, ENT_QUOTES); ?> Trip</h2>
			<table>
				<tr>
					<th></th>
					<th>Name</th>
					<th>Address</th>
					<th>Rating</th>
				</tr>
				<?php
				for ($i = 0; $i < $places; $i++) {
					$letter = chr($i+65);
					$url = htmlspecialchars(preg_replace('/[^A-Za-z0-9]/', ' ', $place[$i][name] ." " . $place[$i][vicinity]), ENT_QUOTES);
					$name = mb_strimwidth(htmlspecialchars($place[$i][name], ENT_QUOTES), '0', '40', '...', 'utf-8');
					$vicinity = preg_replace('/^([^,]*).*$/', '$1', htmlspecialchars($place[$i][vicinity], ENT_QUOTES));
					$ratingStar = floor($place[$i][rating]);
					if($ratingStar < 3) $ratingStar = 2;
					$ratingScore = $place[$i][rating];
					if($ratingScore < 3) $ratingScore = "2.0";
					if($ratingScore == "3") $ratingScore = "3.0";
					if($ratingScore == "4") $ratingScore = "4.0";
					if($ratingScore == "5") $ratingScore = "5.0";
					$urlRoute = htmlspecialchars(preg_replace('/[^A-Za-z0-9]/', ' ', $place[$i+1][name] ." " . $place[$i+1][vicinity]), ENT_QUOTES);
					if($transportation === "DRIVING") {
						$transportationText = "Driving";
						$transportationUrl = "d";
					}
					if($transportation === "WALKING") {
						$transportationText = "Walking";
						$transportationUrl = "w";
					}	
					if($transportation === "BICYCLING") {
						$transportationText = "Bicycling";
						$transportationUrl = "b";
					}
					echo "<tr title=\"See Place Details\" onclick=\"window.open('http://maps.google.com/?q=" . $url . "')\"><td class=\"cell1\">&nbsp;" . $letter .".</td><td class=\"cell1\"><span class='placeName'><a href=\"#\">" . $name . "</a></span></td><td class=\"cell1\"><span class='placeAddress'>" . $vicinity . "</span></td><td class=\"cell1\">";
					for($j = 0; $j < $ratingStar; $j++) {
						echo "<img src='/img/star.png' class='icon'>";
					}
					for($j = 0; $j < (5 - $ratingStar); $j++) {
						echo "<img src='/img/star_non.png' class='icon'>";
					}
					echo " (" . $ratingScore . ")</td></tr>";
					if($i < $places - 1) {
						echo "<tr title=\"Get directions and show routes\" onclick=\"window.open('http://maps.google.com/maps?saddr=" . $url . "&daddr=" . $urlRoute . "&dirflg=" . $transportationUrl . "')\"><td class=\"cell2\"></td><td class=\"cell2\">&darr;&nbsp;&nbsp;(" . $transportationText . ": <span id='duration" . $i . "'></span> Minutes)</td><td class=\"cell2\"></td><td class=\"cell2\"></td></tr>";
					}
				}
				?>
			</table>
			<div id="save" style="display: none;">
				<h2>Save this trip</h2>
				<span class="save">Do not forget your Access Code.</span><br>
				<span class="save">Access Code:&nbsp;&nbsp;<input type="text" id="code" name="code" style="font-size:15px;" value="<?=$code?>" readonly>&nbsp;&nbsp;</span><span class="copied"><img src='/img/okay.png' class='icon'> Copied access code to clipboard</span><br>
				<form name="form" action="planner3.php" method="post"><span class="save">Want to receive it via email?&nbsp;&nbsp;<input type="email" id="email" name="email" id="email" class="email" placeholder="Enter a valid email address" required><input type="hidden" name="code" value="<?=$code?>"> <input type="button" onclick="javascript:sendEmail();" value="Send"></span></form>
			</div>
		</div>
		<script async defer src="https://maps.googleapis.com/maps/api/js?v=3&libraries=places&key=AIzaSyC1azc3nGAcNARexKW_iGdolxO6Afs5W-4&callback=initialize"></script>
		<script>
		function initialize() {
			var optimize = false;
			var warningHTML = "<img src='/img/warning.png' class='icon'>";
			var map = new google.maps.Map(
				document.getElementById("map_canvas"), {
					mapTypeControl: false,
					fullscreenControl: true,
					fullscreenControlOptions: {
						position: google.maps.ControlPosition.LEFT_BOTTOM
					},
					mapTypeId: google.maps.MapTypeId.ROADMAP
				});
			var directionsService = new google.maps.DirectionsService();
			
			var waypts = [];
			waypts.push({
				location: {
					placeId: "<?=$place[1][place_id]?>"
				},
				stopover: true
			});
			<?php if($places>3) {?>
			waypts.push({
				location: {
					placeId: "<?=$place[2][place_id]?>"
				},
				stopover: true
			});
			<?}?>
			<?php if($places>4) {?>
			waypts.push({
				location: {
					placeId: "<?=$place[3][place_id]?>"
				},
				stopover: true
			});
			<?}?>
			<?php if($places>5) {?>
			waypts.push({
				location: {
					placeId: "<?=$place[4][place_id]?>"
				},
				stopover: true
			});
			<?}?>
			<?php if($places>6) {?>
			waypts.push({
				location: {
					placeId: "<?=$place[5][place_id]?>"
				},
				stopover: true
			});
			<?}?>
			var request = {
				origin: {
					placeId: "<?=$place[0][place_id]?>"
				},
				waypoints: waypts,
				destination: {
					placeId: "<?=$place[$places-1][place_id]?>"
				},
				optimizeWaypoints: optimize,
				travelMode: "<?=$transportation?>"
			}
			directionsService.route(request, function (response, status) {
				if (status === 'OK') {
					var dirDisp0 = new google.maps.DirectionsRenderer({
						map: map
					})
					dirDisp0.setDirections(response);
					var route = response.routes[0];
					document.getElementById("duration0").innerHTML = Math.round(route.legs[0].duration.value / 60);
					document.getElementById("duration1").innerHTML = Math.round(route.legs[1].duration.value / 60);
					<?php if($places>3) {?>document.getElementById("duration2").innerHTML = Math.round(route.legs[2].duration.value / 60);<?}?>
					<?php if($places>4) {?>document.getElementById("duration3").innerHTML = Math.round(route.legs[3].duration.value / 60);<?}?>
					<?php if($places>5) {?>document.getElementById("duration4").innerHTML = Math.round(route.legs[4].duration.value / 60);<?}?>
					<?php if($places>6) {?>document.getElementById("duration5").innerHTML = Math.round(route.legs[5].duration.value / 60);<?}?>
				} else {
					<?php if($transportation == "WALKING") {?>window.alert("That's too far to walk. Please change your transportation.");history.back();<?}else{?>window.alert("The requested path was not found. Please try it the other way.");history.back();<?}?>
				}
			});
		}
		//google.maps.event.addDomListener(window, "load", initialize);
		</script>
	</body>
</html>
<?php
$mysqli->close();
?>