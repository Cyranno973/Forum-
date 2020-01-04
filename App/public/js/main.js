$(document).ready(function() {
  $(".nav-trigger").click(function() {
    $(".side-nav").toggleClass("visible");
  });
});
var btnAlert = document.querySelector(".alert");
var actived = sessionStorage.getItem('actived');
console.log(actived);

if (actived == "yes") {
	btnAlert.classList.add("alertActive");
  } else {
	  console.log('ya rien');  
  }
function myFunction() {
	var alertup = btnAlert.classList.contains("alertActive");
	if (alertup == false) {
		btnAlert.classList.toggle("alertActive");
		sessionStorage.setItem("actived", "yes");
	   console.log("yes");
	 } else {
	   sessionStorage.setItem("actived", "no");
	   console.log("nono");
	 }
  console.log(alertup);
}
btnAlert.addEventListener("click", function() {
  myFunction();
});
