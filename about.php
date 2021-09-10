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
		<link rel="stylesheet" href="css/temp.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<title>Trip Planner</title>
	</head>
	<body>
		<nav>
			<ul>
				<li class="logo"><img src="img/logo_icon.png" class="logoImage" alt="logoImage" onclick="window.location.href='http://tripplanner.ml/';"></li>
				<li><a href="about.php#contact" class="navtext">Contact</a></li>
				<li><a href="about.php#gallery" class="navtext">Gallery</a></li>
				<li><a href="about.php" class="active">About Us</a></li>
				<li><a href="planner1.php" class="navtext">Plan your trip</a></li>
				<li><a href="http://tripplanner.ml/" class="navtext">Home</a></li>
			</ul>
		</nav>
	<!--the about portion -->
	<div class="about_us" id="about">
		<h3 class="h3_about">ABOUT US</h3>
		<div class="story" style="margin-top:0px">
			<h4 class="h4_about">Mission</h4>
			<p class="h5_about">Our Customers are our great value</p>
			<p class="p2">Trip Planner was established in 2017 with the main goal to provide our clients with the great plan to travel and amazing places to go. We are proud that our clients recommend us to their friends, relatives and acquaintances. We, in turn, are doing our utmost to make your rest positive and memorable, try to provide everything necessary to make you feel confident during your vacation.</p>
		</div>
		<div class="team_mem" style="margin-top:0px">
			<h3 class="h3_team">OUR TEAM MEMBERS</h3>
			<p class="p1_team">Who involves in this project</p>
		</div>
		<div class="team_con">
			<div class="first_mem">
				<div class="mem1">
					<img src="images/mypic.jpg" alt="Rotana" style="width:100%">
					<div class="mem1_info">
						<h3>Rotana Nou</h3>
						<p class="mem1_role">Web Developer</p>
						<p>University of Massachusetts Lowell</p>
						<div style="margi: 24px 0;">
							<a href="javascript:alert('He does not have this social media.');"><i class="fa fa-twitter"></i></a>
							<a href="javascript:alert('He does not have this social media.');"><i class="fa fa-linkedin"></i></a>
							<a href="https://www.facebook.com/ratana.j.nou" target="_blank"><i class="fa fa-facebook"></i></a>
						</div>
						<p><a href="mailto:Rotana_Nou@student.uml.edu"><button class="prof_but"><i class="fa fa-envelope"></i>Contact</button></a></p>
				   </div>
				</div>
			</div>
			<div class="second_mem">
				<div class="mem2">
					<img src="images/jace.jpg" alt="Junghwan" style="width:100%">
					<div class="mem2_info">
						<h3>Junghwan Kim</h3>
						<p class="mem1_role">Web Developer</p>
						<p>University of Massachusetss Lowell</p>
						<div style="margi: 24px 0;">
							<a href="javascript:alert('He does not have this social media.');"><i class="fa fa-twitter"></i></a>
							<a href="javascript:alert('He does not have this social media.');"><i class="fa fa-linkedin"></i></a>
							<a href="javascript:alert('He does not have this social media.');"><i class="fa fa-facebook"></i></a>
						</div>
						<p><a href="mailto:Junghwan_Kim@student.uml.edu"><button class="prof_but"><i class="fa fa-envelope"></i> Contact</button></a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
 <!-- gallery page-->
	<div class="whole_gal" id="gallery">
		<h3 class="h3_gal">GALLERY</h3>
		<p class="p1_gal">Explore Best Pictures</p>
		<div class="left_gal" style="margin-top:64px">
			<div class="pic1_gal">
				<a target="_blank" href="image.html">
					<img src="images/boston.jpg" alt="Boston">
				</a>
			</div>
			<div class="pic2_gal">
				<a target="_blank" href="image.html">
					<img src="images/beach.jpg" alt="Beach">
				</a>
			</div>
			<div class="pic3_gal">
				<a target="_blank" href="image.html">
					<img src="images/city.jpg" alt="City">
				</a>
			</div>
			<div class="pic4_gal">
				<a target="_blank" href="image.html">
					<img src="images/newyork.jpg" alt="Newyork">
				</a>
			</div>
		</div>
		<!-- bottom part of the gallery-->
		<div class="right_gal">
			<div class="pic5_gal">
				<a target="_blank" href="image.html">
					<img src="images/rock.jpg" alt="Rock">
				</a>
			</div>
			<div class="pic6_gal">
				<a target="_blank" href="image.html">
					<img src="images/washington.jpg" alt="Washington">
				</a>
			</div>
			<div class="pic7_gal">
				<a target="_blank" href="image.html">
					<img src="images/water.jpg" alt="Water">
				</a>
			</div>
			<div class="pic8_gal">
				<a target="_blank" href="image.html">
					<img src="images/sea.jpg" alt="Sea">
				</a>
			</div>
		</div>
	</div>

 <!-- Contact Section -->
	<div class="contact_contain" id="contact">
		<h3 class="h3_contact">CONTACTS</h3>
		<p class="p1_contact">Do you have questions? Send us email</p>
		<div class="info_contact" style="margin-top:64px">
			<div class="left_info">
				<p><i class="fa fa-phone fa-fw w3-xxlarge w3-margin-right"></i> Phone:<br>1 (800) 689-1487</p>
				<p><i class="fa fa-map-marker fa-fw w3-xxlarge w3-margin-right"></i> Address:<br>University of Massachusetts Lowell<br>220 Pawtucket St, Lowell, MA 01854</p>
				<p><i class="fa fa-envelope fa-fw w3-xxlarge w3-margin-right"> </i> Email:<br><a class="email_all" href="mailto:Rotana_Nou@student.uml.edu">Rotana_Nou@student.uml.edu</a><br><a class="email_all" href="mailto:Junghwan_Kim@student.uml.edu">Junghwan_Kim@student.uml.edu</a></p>
				<form class="formation" action="/action_page.php" target="_blank">
					<p>
						<a href="mailto:Rotana_Nou@student.uml.edu?cc=Junghwan_Kim@student.uml.edu"<button class="email_button" type="submit">
						<i class="fa fa-paper-plane"></i> SEND EMAIL
					</button></a>
					</p>
				</form>
			</div>
				<div id="map" class="map_api" style="width:500px;height:360px;background:white"></div>
		</div>
	</div>

 <!-- Footer -->
	<footer class="page_footer">
		<div class="foot">
		<a href="http://tripplanner.ml" class="arrow_but"><i class="fa fa-arrow-up w3-margin-right"></i>Back to Homepage</a>
		<div class="icon">
			<a href="https://www.facebook.com/ratana.j.nou" target="_blank"><i class="fa fa-facebook-official w3-hover-text-indigo"></i></a>
			<a href="https://www.instagram.com/ro7ana/" target="_blank"><i class="fa fa-instagram w3-hover-text-purple"></i></a>
			<a href="javascript:alert('He does not have this social media.');"><i class="fa fa-twitter w3-hover-text-light-blue"></i></a>
			<a href="javascript:alert('He does not have this social media.');"><i class="fa fa-linkedin w3-hover-text-indigo"></i></a>
		</div>
		<p>Sponsered by <a href="http://tripplanner.ml" title="Tripplanner" class="sponser">Tripplanner</a></p>
	</div>
	</footer>
 <!-- google map script-->
 <script src ="js/map_cont.js">></script>
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCmZvJ_xML-RWgqv8BH8H4NItjQzNlIN0I&callback=myMap"></script>
 </body>
 </html>
