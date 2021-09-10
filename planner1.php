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

$parameter = htmlspecialchars(parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY), ENT_QUOTES, 'UTF-8');

if($parameter !== "") {
	$code = htmlspecialchars($_GET['code'], ENT_QUOTES, 'UTF-8');
	$code = $mysqli->real_escape_string($code);
	$query = "SELECT * FROM `trips` WHERE `code` = '$code'";
	$result = $mysqli->query($query)->fetch_assoc();
	if(empty($result)) {
		echo "<script>alert(\"Access code is incorrect.\");location.href=\"planner1.php\";</script>";
		exit;
	}
}
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
		<meta charset="utf-8">
		<link rel="icon" href="img/favicon.png">
		<link rel="stylesheet" href="css/style.css">
		<script src="js/planner.js"></script>
		<title>Trip Planner</title>
	</head>
	<body>
		<nav>
			<ul>
				<li class="logo"><img src="img/logo_icon.png" class="logoImage" alt="logoImage" onclick="window.location.href = 'http://tripplanner.ml/';"></li>
				<li><a href="about.php#contact">Contact</a></li>
				<li><a href="about.php#gallery">Gallery</a></li>
				<li><a href="about.php">About Us</a></li>
				<li><a href="planner1.php" class="active">Plan your trip</a></li>
				<li><a href="http://tripplanner.ml/">Home</a></li>
			</ul>
		</nav>
		<section class="planner1">
			<div class="top">
				<img src="img/blank.jpg" class="blank" alt="blank">
			</div>
			<div class="left">
				<fieldset class="left">
				<legend>Customize Your Trip</legend>
				<form name="form" id="form" action="planner2.php" method="post"><br>
				<span class="field">City:<span class="none">xx</span>&nbsp;&nbsp;&nbsp;&nbsp;<select name="city" id="city">
					<option value=""<?php if($parameter === "") { ?> selected<?php } ?>>Select City</option>
					<option value="4"<?php if($result['city'] == "4") { ?> selected<?php } ?>>Chicago, IL</option>
					<option value="4"<?php if($result['city'] == "5") { ?> selected<?php } ?>>Los Angeles, CA</option>
					<option value="0"<?php if($result['city'] == "0") { ?> selected<?php } ?>>Boston, MA</option>
					<option value="1"<?php if($result['city'] == "1") { ?> selected<?php } ?>>Miami, FL</option>
					<option value="2"<?php if($result['city'] == "2") { ?> selected<?php } ?>>New York, NY</option>
					<option value="3"<?php if($result['city'] == "3") { ?> selected<?php } ?>>Washington, D.C.</option>
				</select></span><br><br>
				<span class="field">Places:&nbsp;&nbsp;&nbsp;&nbsp;<select name="places" id="places">
					<option value=""<?php if($parameter === "") { ?> selected<?php } ?>>Select Places</option>
					<option value="3"<?php if($result['places'] == "3") { ?> selected<?php } ?>>3 Places</option>
					<option value="4"<?php if($result['places'] == "4") { ?> selected<?php } ?>>4 Places</option>
					<option value="5"<?php if($result['places'] == "5") { ?> selected<?php } ?>>5 Places</option>
					<option value="6"<?php if($result['places'] == "6") { ?> selected<?php } ?>>6 Places</option>
				</select></span><br><br>
				<span class="field">Types</span><br>
					<label><input type="checkbox" name="type0" id="type0" value="0" class="field"<?php if($parameter === "" || $result['type0'] === "0") { ?> checked<?php } ?>> Amusement Park</label>&nbsp;&nbsp;
					<label><input type="checkbox" name="type1" id="type1" value="1"<?php if($parameter === "" || $result['type1'] === "1") { ?> checked<?php } ?>> Aquarium</label>&nbsp;&nbsp;
					<label><input type="checkbox" name="type2" id="type2" value="2"<?php if($parameter === "" || $result['type2'] === "2") { ?> checked<?php } ?>> Art Gallery</label>&nbsp;&nbsp;
					<label><input type="checkbox" name="type3" id="type3" value="3" onchange="checkAge();"<?php if($result['type3'] === "3") { ?> checked<?php } ?>> Casino</label>&nbsp;&nbsp;
					<label><input type="checkbox" name="type4" id="type4" value="4"<?php if($parameter === "" || $result['type4'] === "4") { ?> checked<?php } ?>> City Hall</label><br>
					<label><input type="checkbox" name="type5" id="type5" value="5" class="field"<?php if($parameter === "" || $result['type5'] === "5") { ?> checked<?php } ?>> Courthouse</label>&nbsp;&nbsp;
					<label><input type="checkbox" name="type6" id="type6" value="6"<?php if($parameter === "" || $result['type6'] === "6") { ?> checked<?php } ?>> Library</label>&nbsp;&nbsp;
					<label><input type="checkbox" name="type7" id="type7" value="7"<?php if($parameter === "" || $result['type7'] === "7") { ?> checked<?php } ?>> Museum</label>&nbsp;&nbsp;
					<label><input type="checkbox" name="type8" id="type8" value="8"<?php if($parameter === "" || $result['type8'] === "8") { ?> checked<?php } ?>> Park</label>&nbsp;&nbsp;
					<label><input type="checkbox" name="type9" id="type9" value="9"<?php if($parameter === "" || $result['type9'] === "9") { ?> checked<?php } ?>> Stadium</label>&nbsp;&nbsp;
					<label><input type="checkbox" name="type10" id="type10" value="10"<?php if($parameter === "" || $result['type10'] === "10") { ?> checked<?php } ?>> Zoo</label><br><br>
				<span class="field">Transportation</span><br>
					<label><input type="radio" name="transportation" value="DRIVING" class="field"<?php if($parameter === "" || $result['transportation'] == "DRIVING") { ?> checked<?php } ?>> Driving</label>&nbsp;&nbsp;&nbsp;<label><input type="radio" name="transportation" value="WALKING"<?php if($result['transportation'] == "WALKING") { ?> checked<?php } ?>> Walking</label>&nbsp;&nbsp;&nbsp;<label><input type="radio" name="transportation" value="BICYCLING"<?php if($result['transportation'] == "BICYCLING") { ?> checked<?php } ?>> Bicycling</label><br><br>
				<span class="field">Sort</span><br>
					<label><input type="radio" name="sort" value="y" class="field"<?php if($parameter === "" || $result['sort'] == "y") { ?> checked<?php } ?>> Shortest Distance</label>&nbsp;&nbsp;&nbsp;<label><input type="radio" name="sort" value="rating"<?php if($result['sort'] == "rating") { ?> checked<?php } ?>> Highest Rated</label><br><br>
				<input type="hidden" name="code" value="<?php echo $code; ?>"><a href="#" class="button2" onclick="javascript:submit();">Plan</a><!--<input type="button" class="fieldReset" value="Reset" onclick="window.location.href = 'planner1.php';">--><br><br>
				</form>
				</fieldset>
			</div>
			<div class="right">
				<fieldset class="right">
				<legend>Load Your Trip</legend>
				<br><?php if($parameter !== "") { ?><span class="loaded"><img src="/img/okay.png" class="icon"> Loaded your previous trip.<br><br></span><?php } ?>
				<span class="field">Want to load your previous trip?</span><br>
				<span class="field">Access Code:&nbsp;&nbsp;<input type="number" id="code" name="code" min="000000" max="999999" value="<?=$code?>" oninput="javascript: if (this.value.length > 6) this.value = this.value.slice(0, 6);"></span><br><br>
				<a href="#" class="button2" onclick="javascript:load();">Load</a><br><br>
				</fieldset>
			</div>
		</section>
	</body>
</html>
<?php
$mysqli->close();
?>