/*
	Trip Planner Project

	Developer: Junghwan Kim (Junghwan_Kim@student.uml.edu), Rotana Nou (Rotana_Nou@student.uml.edu)
	Affiliation: University of Massachusetts Lowell: COMP.4610 GUI PROGRAMMING II

	Date: 05/02/2017
	Reference: w3schools.com, googlemapi.com, tripadvisor.com

	Copyright © 2017 Junghwan Kim, Rotana Nou. All rights reserved.
*/
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}
