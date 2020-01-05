class CheckForm {
	constructor(nameForm) {
	  this.nameForm = nameForm;
document.forms[this.nameForm].addEventListener("submit", function(e) {
  var erreur;
    // this correspond au formulaire submit dans addEventListener
    var inputs = this;
    for (var i = 0; i < inputs.length; i++) {
      if (!inputs[i].value) {
        erreur = "Veuillez renseingez tous les champs";
      }
    }
    if (erreur) {
      event.preventDefault();
      document.getElementById("erreur").innerHTML = erreur;
      return false;
    } else {
   
    }
   });
	}
  }
  