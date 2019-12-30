$(document).ready(function () {
	var trigger = $('.hamburger'),
		
	   isClosed = false;
  
	  trigger.click(function () {
		hamburger_cross();      
	  });
  
	  function hamburger_cross() {
  
		if (isClosed == true) {          
		
		  trigger.removeClass('is-open');
		  trigger.addClass('is-closed');
		  isClosed = false;
		} else {   
		 
		  trigger.removeClass('is-closed');
		  trigger.addClass('is-open');
		  isClosed = true;
		}
	}
	
	$('[data-toggle="offcanvas"]').click(function () {
		  $('#wrapper').toggleClass('toggled');
	});  
  });


  var request = new XMLHttpRequest();
request.onreadystatechange = function() {
    if (this.readyState == XMLHttpRequest.DONE && this.status == 200) {
        var response = JSON.parse(this.responseText);
		console.log(response.current_condition.condition);
		var meteoImg = document.getElementById('icon');
		meteoImg.textContent = response.current_condition.icon;
		var meteohumidity = document.getElementById('humidity');
		meteohumidity.textContent = response.current_condition.humidity;
		var meteocondition = document.getElementById('condition');
		meteocondition.textContent = response.current_condition.condition;
		var meteodate = document.getElementById('date');
		meteodate.textContent = response.current_condition.date;
		var meteoday_long = document.getElementById('day_long');
		meteoday_long.textContent = response.current_condition.day_long;
		var meteotmp = document.getElementById('tmp');
		meteotmp.textContent = response.current_condition.tmp;

    }
};
request.open("GET", "https://www.prevision-meteo.ch/services/json/paris");
request.send();
