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

$code = $email = "";
$code = $mysqli->real_escape_string($_POST['code']);
$email = $mysqli->real_escape_string($_POST['email']);
$code = test_input($code);
$email = test_input($email);

if(empty($code)) {
	echo "<script>alert(\"Your connect is incorrect.\");location.href=\"planner1.php\";</script>";
	exit;
}
if(empty($email)) {
	echo "<script>alert(\"Please enter a valid email address.\");history.back();</script>";
	exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    $email =  filter_var($email, FILTER_SANITIZE_EMAIL);
} else {
	echo "<script>alert(\"Please enter a valid email address.\");history.back();</script>";
	exit;
}

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

$sender = "admin@tripplanner.ml";
$subject = "Your Trip Planner Access Code";
$message = "Dear Trip Planner Guest,<br><br>You requested your access code.<br>Access Code: <strong>$code</strong><br><a href=\"http://tripplanner.ml/planner1.php?code=$code\">Access Now</a><br><br>Thank you,<br>Trip Planner";
$headers = "From:Trip Planner <$sender>\r\n";
$headers .= "Content-type: text/html; charset=utf-8";

if(mail($email, $subject, $message, $headers)) {
	echo "<script>alert(\"The mail has been sent successfully.\");history.back();</script>";
	exit;
} else {
	echo "<script>alert(\"Error occurred during sending email.\");history.back();</script>";
	exit; 
}

$mysqli->close();
?>