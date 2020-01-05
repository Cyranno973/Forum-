$(document).ready(function() {
  $(".nav-trigger").click(function() {
    $(".side-nav").toggleClass("visible");
  });
});
var weather = document.querySelector("weather");
if (document.querySelector(".weather")) {
  var request = new XMLHttpRequest();
  request.onreadystatechange = function() {
    if (this.readyState == XMLHttpRequest.DONE && this.status == 200) {
      var response = JSON.parse(this.responseText);

      var citie = document.querySelector(".citie");
      citie.innerHTML += ` ${response.city_info.name}`;
      var temp = document.querySelector(".temp");
      temp.innerHTML += `${response.current_condition.tmp} °C :`;
      var condition = document.querySelector(".condition");
      condition.textContent = response.current_condition.condition;
    }
  };
  request.open("GET", "https://www.prevision-meteo.ch/services/json/paris");
  request.send();
}
if (document.forms["inscription"]) {
  var formInscription = new CheckForm("inscription");
}
if (document.forms["connexion"]) {
  var formConnexion = new CheckForm("connexion");
}
if (document.forms["inscription"]) {
  document.forms["inscription"]["passwordInscription2"].addEventListener("input",function(e) {
    var mdpErreur = document.getElementById("erreur");
    if (
      this.value != document.forms["inscription"]["passwordInscription"].value
    ) {
      mdpErreur.innerHTML = "adresse non identique";
    } else {
      mdpErreur.innerHTML = "";
    }
  }
);
}

