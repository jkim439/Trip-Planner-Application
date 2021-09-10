/*
	Trip Planner Project

	Developer: Junghwan Kim (Junghwan_Kim@student.uml.edu), Rotana Nou (Rotana_Nou@student.uml.edu)
	Affiliation: University of Massachusetts Lowell: COMP.4610 GUI PROGRAMMING II

	Date: 05/02/2017
	Reference: w3schools.com, googlemapi.com, tripadvisor.com

	Copyright © 2017 Junghwan Kim, Rotana Nou. All rights reserved.
*/
function checkAge() {
	var type3 = document.getElementById("type3");
	if(type3.checked == true) {
		var confirmation = confirm("Are you over 18 years of age?");
		if (confirmation) {
			type3.checked = true;
		} else {
			type3.checked = false;
		}
	}
}
function reset() {
	document.getElementById("form").reset();
}
function sendEmail() {
	var email = document.getElementById("email");
    var format = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(!email.value.match(format)) {
		alert("Please enter a valid email address.");
		email.focus();
		return false;
	} else {
    document.getElementById("overlay").style.visibility = "visible";
	document.form.submit();
	}
}
function exit() {
	var confirmation = confirm("If you exit now, you will lose your data.");
	if (confirmation) {
		window.location.href = "http://tripplanner.ml/";
	}
}
function load() {
	var code = document.getElementById("code").value;
    window.location.href = "planner1.php?code=" + code ;
}
function save() {
    document.getElementById("saveMenu").style.display = "none";
    document.getElementById("save").style.display = "inline";
	document.getElementById("code").select();
	document.execCommand('copy');
}
function submit() {
	var cityField = document.getElementById("city").selectedIndex;
	cityField = document.getElementsByTagName("option")[cityField].value;
	if(cityField != "0" && cityField != "1" && cityField !="2" && cityField != "3" && cityField != "4" && cityField != "5") {
		alert("Please select city.");
		return false;
	}
	var placesField = document.getElementById("places").selectedIndex;
	placesField = document.getElementsByTagName("option")[placesField].value;
	if(placesField != "0" && placesField != "1" && placesField !="2" && placesField != "4") {
		alert("Please select places.");
		return false;
	}
	var typesNum = 0;
	var type0 = document.getElementById("type0");
	var type1 = document.getElementById("type1");
	var type2 = document.getElementById("type2");
	var type3 = document.getElementById("type3");
	var type4 = document.getElementById("type4");
	var type5 = document.getElementById("type5");
	var type6 = document.getElementById("type6");
	var type7 = document.getElementById("type7");
	var type8 = document.getElementById("type8");
	var type9 = document.getElementById("type9");
	var type10 = document.getElementById("type10");
	if(type0.checked == true) typesNum++;
	if(type1.checked == true) typesNum++;
	if(type2.checked == true) typesNum++;
	if(type3.checked == true) typesNum++;
	if(type4.checked == true) typesNum++;
	if(type5.checked == true) typesNum++;
	if(type6.checked == true) typesNum++;
	if(type7.checked == true) typesNum++;
	if(type8.checked == true) typesNum++;
	if(type9.checked == true) typesNum++;
	if(type10.checked == true) typesNum++;
	if(typesNum < 1) {
		alert("Please select at least one type.");
		return false;
	}
	document.form.submit();
}