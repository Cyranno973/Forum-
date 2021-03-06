<?php
require "vendor/autoload.php";
use \App\controller\ControllerFront;
use \App\controller\ControllerBack;

try {
	//si séssion n'existe pas je start
	if (!isset($_SESSION)) {
		session_start();
	}
	if (isset($_GET['action'])) {
		if ($_GET['action'] == 'goFilterSujet') {
			if (!empty($_GET['id']) && $_GET['id'] > 0) {
				$monBack = new controllerBack;
				$monBack->gofilterSujet();
			} else {
				throw new Exception('Probleme Id Rubrique');
			}
		} elseif ($_GET['action'] == 'goSelectSujet') {
			if (isset($_GET['page']) && !empty($_GET['page']) && ctype_digit($_GET['page']) == 1) {
				$monBack = new controllerBack;
				$monBack->goSelectSujet();
			} else {
				$pageCourante = 1;
			}
		} elseif ($_GET['action'] == 'listRubric') {
			if (!empty($_SESSION['membre']) and  $_SESSION['powerUser'] > 0) {
				$monFront = new controllerFront;
				$monFront->goListRubric();
			} else {
				throw new Exception('Interdit d \'accès');
			}
		} elseif ($_GET['action'] == 'createRubric') {
			if (!empty($_SESSION['membre']) and  $_SESSION['powerUser'] > 0) {
				if (!empty($_POST['nameRubric']) and !empty($_FILES['file'])) {
					$monBack = new controllerBack;
					$monBack->goCreateRubric();
				} else {
					throw new Exception('Veuillez vous ');
				}
			} else {
				throw new Exception('Veuillez vous ');
			}
		} elseif ($_GET['action'] == 'goUpdateRubric') {
			if (!empty($_SESSION['membre']) and  $_SESSION['powerUser'] > 0) {
				if (isset($_GET['id']) && $_GET['id'] > 0) {
					$monBack = new controllerBack;
					$monBack->goUpdateRubric();
				} else {
					throw new Exception('Probleme Id');
				}
			} else {
				throw new Exception('Interdit d \'accès');
			}
		} elseif ($_GET['action'] == 'goDeleteRubric') {
			if (!empty($_SESSION['membre']) and  $_SESSION['powerUser'] > 0) {
				if (isset($_GET['id']) && $_GET['id'] > 0) {
					$monBack = new controllerBack;
					$monBack->goDeleteRubric();
				} else {
					throw new Exception('Probleme Id');
				}
			} else {
				throw new Exception('Interdit d \'accès');
			}
		} elseif ($_GET['action'] == 'listSujet') {
			if (isset($_SESSION['membre'])) {
				$monBack = new controllerBack;
				$monBack->goListSujet();
			} else {
				throw new Exception('Interdit d \'accès');
			}
		} elseif ($_GET['action'] == 'goUpdateSujet') {
			if (!empty($_SESSION['membre']) and  $_SESSION['powerUser'] > 0) {
				if (isset($_GET['id']) && $_GET['id'] > 0) {
					$monBack = new controllerBack;
					$monBack->goUpdateSujet();
				} else {
					throw new Exception('Probleme Id');
				}
			} else {
				throw new Exception('Interdit d \'accès');
			}
		} elseif ($_GET['action'] == 'createSujet') {
			if ((!empty($_SESSION['membre']))) {
				if (!empty($_POST['nameSujet']) and !empty($_POST['sujetContent']) and !empty($_POST['fname'])) {
					$_POST['nameSujet'] = htmlspecialchars($_POST['nameSujet']);
					$monBack = new controllerBack;
					$monBack->goCreateSujet();
				} else {
					throw new Exception('Votre document ou titre est vide');
				}
			} else {
				throw new Exception('Vous devez être membre  pour y acceder');
			}
		} elseif ($_GET['action'] == 'goHandlingUpdateSujet') {
			if (!empty($_SESSION['membre']) && $_SESSION['powerUser'] > 1) {
				if (!empty($_POST['nameSujet']) && !empty($_POST['sujetContent']) && !empty($_POST['fname'])) {
					$_POST['nameSujet'] = htmlspecialchars($_POST['nameSujet']);
					$monBack = new controllerBack;
					$monBack->goHandlingUpdateSujet();
				} else {
					throw new Exception('Votre document ou titre est vide');
				}
			} else {
				throw new Exception('Interdit d\'accès');
			}
		} elseif ($_GET['action'] == 'goDeleteSujet') {
			if (!empty($_SESSION['membre']) && $_SESSION['powerUser'] > 1) {
				if (isset($_GET['id']) && $_GET['id'] > 0) {

					$monBack = new controllerBack;
					$monBack->goDeleteSujet();
				} else {
					throw new Exception('Probleme Id');
				}
			} else {
				throw new Exception('Interdit d\'accès');
			}
		} elseif ($_GET['action'] == 'goHandlingUpdateRubric') {
			if (!empty($_SESSION['membre']) && $_SESSION['powerUser'] > 1) {
				if (isset($_GET['id']) && $_GET['id'] > 0) {
					$monBack = new controllerBack;
					$monBack->goHandlingUpdateRubric();
				} else {
					throw new Exception('Probleme Id');
				}
			} else {
				throw new Exception('Interdit d \'accès');
			}
		} elseif ($_GET['action'] == 'inscription') {
			$monFront = new controllerFront;
			$monFront->inscription();
		} elseif ($_GET['action'] == 'deconnexion') {
			$monFront = new controllerFront;
			$monFront->goDeconnexion();
		} elseif ($_GET['action'] == 'inscriptionTraitement') {

			if (!empty($_POST['pseudoInscription']) and !empty($_POST['passwordInscription']) and !empty($_POST['passwordInscription2']) and !empty($_POST['emailInscription'])) {
				$_POST['pseudoInscription'] = strip_tags($_POST['pseudoInscription']);
				$_POST['passwordInscription'] = strip_tags($_POST['passwordInscription']);
				$_POST['passwordInscription2'] = strip_tags($_POST['passwordInscription2']);
				$_POST['emailInscription'] = strip_tags($_POST['emailInscription']);
				if ($_POST['passwordInscription'] == $_POST['passwordInscription2']) {

					$monFront = new controllerFront;
					$monFront->verifyDuplicateInscription();
				}
			} else {
				$monFront = new controllerFront;
				//	$monFront->inscription();
			}
		} elseif ($_GET['action'] == 'traitementMembre') {

			if (!empty($_POST['pseudoConnect']) and !empty($_POST['passwordConnect'])) {
				$_POST['pseudoConnect'] = strip_tags($_POST['pseudoConnect']);
				$_POST['passwordConnect'] = strip_tags($_POST['passwordConnect']);
				$monFront = new controllerFront;
				$monFront->verifyMembre();
			} else {
				$monFront = new controllerFront;
				$monFront->goConnect();
			}
		} elseif ($_GET['action'] == 'ajoutComment') {
			if ((isset($_SESSION['membre']))) {
				if (!empty($_POST['message'])) {
					$_POST['message'] = htmlspecialchars($_POST['message']);
					$monFront = new controllerFront;
					$monFront->addComment();
				} else {
					$messageError = 'veuillez inserez un message';
					require('App/view/error.php');
				}
			} else {
				throw new Exception('Veuillez vous connectez');
			}
		} elseif ($_GET['action'] == 'connexion') {
			$monFront = new controllerFront;
			$monFront->goConnect();
		} elseif ($_GET['action'] == 'addAlert') {
			if ((isset($_SESSION['membre']))) {
				if ((!empty($_GET['idcomment'])) and (!empty($_SESSION['idUser'])) and (!empty($_GET['id_sujet']))) {
					$monFront = new controllerFront;
					$monFront->goAddAlert();
				} else {
					throw new Exception('Probleme Id');
				}
			} else {
				throw new Exception('Veuillez vous connectez');
			}
		} elseif ($_GET['action'] == 'listMembres') {
			if (!empty($_SESSION['membre']) and  $_SESSION['powerUser'] >= 1) {
				$monFront = new controllerFront;
				$monFront->golistMembres();
			} else {
				throw new Exception('Vous devez être administrateur  pour y acceder');
			}
		} elseif ($_GET['action'] == 'listComments') {
			if (!empty($_SESSION['membre']) and  $_SESSION['powerUser'] >= 1) {
				$monFront = new controllerFront;
				$monFront->golistComments();
			} else {
				throw new Exception('Vous devez être administrateur  pour y acceder');
			}
		} elseif ($_GET['action'] == 'listAlerts') {
			if (!empty($_SESSION['membre']) and  $_SESSION['powerUser'] >= 1) {
				$monFront = new controllerFront;
				$monFront->golistAlerts();
			} else {
				throw new Exception('Vous devez être administrateur  pour y acceder');
			}
		} elseif ($_GET['action'] == 'goDeleteComment') {
			if (!empty($_SESSION['membre']) and  $_SESSION['powerUser'] >= 1) {
				$monFront = new controllerFront;
				$monFront->goDeleteComment();
			} else {
				throw new Exception('Vous devez être administrateur  pour y acceder');
			}
		} elseif ($_GET['action'] == 'goDeleteUser') {
			if (!empty($_SESSION['membre']) and $_SESSION['powerUser'] >= 3) {
				$monBack = new controllerBack;
				$monBack->goDeleteUser();
			} else {
				throw new Exception('Vous devez être administrateur  pour y acceder');
			}
		} elseif ($_GET['action'] == 'goAddOperator') {
			if (!empty($_SESSION['membre']) and $_SESSION['powerUser'] >= 3) {
				$monBack = new controllerBack;
				$monBack->goAddOperator();
			} else {
				throw new Exception('Vous devez être administrateur  pour y acceder');
			}
		} elseif ($_GET['action'] == 'goUpdateOperator') {
			if (!empty($_SESSION['membre']) and $_SESSION['powerUser'] >= 1) {
				if (isset($_GET['id']) and (!empty($_GET['id']))) {
					$monBack = new controllerBack;
					$monBack->goUpdateOperator();
				} else {
					throw new Exception('Probleme ID');
				}
			} else {
				throw new Exception('Vous devez être administrateur  pour y acceder');
			}
		} elseif ($_GET['action'] == 'handlingInscriptionOperator') {
			if (!empty($_SESSION['membre']) and $_SESSION['powerUser'] >= 3)
				if (!empty($_POST['pseudoInscription']) and !empty($_POST['passwordInscription'])  and !empty($_POST['emailInscription']) and !empty($_POST['power'])) {
					$_POST['pseudoInscription'] = strip_tags($_POST['pseudoInscription']);
					$_POST['passwordInscription'] = strip_tags($_POST['passwordInscription']);
					$_POST['emailInscription'] = strip_tags($_POST['emailInscription']);
					$_POST['power'] = strip_tags($_POST['power']);
					$monBack = new controllerBack;
					$monBack->handlingInscriptionOperator();
				} else {
					throw new Exception('Probleme Ajout utilisateur');
				} else {
				throw new Exception('Vous devez être administrateur  pour y acceder');
			}
		} elseif ($_GET['action'] == 'handlingUpdateOperator') {
			if (!empty($_SESSION['membre']) and $_SESSION['powerUser'] >= 3)
				if (!empty($_GET['id']) && !empty($_POST['pseudoConnect']) && !empty($_POST['passwordConnect']) && !empty($_POST['emailConnect']) && isset($_POST['power'])) {
					$_POST['pseudoConnect'] = strip_tags($_POST['pseudoConnect']);
					$_POST['passwordConnect'] = strip_tags($_POST['passwordConnect']);
					$_POST['emailConnect'] = strip_tags($_POST['emailConnect']);
					$_POST['power'] = strip_tags($_POST['power']);
					$monBack = new controllerBack;
					$monBack->handlingUpdateOperator();
				} else {
					throw new Exception('Probleme Ajout utilisateurs');
				} else {
				throw new Exception('Vous devez être administrateur  pour y acceder');
			}
		} elseif ($_GET['action'] == 'goDeleteAlert') {
			if ((!empty($_SESSION['membre'])) and  ($_SESSION['powerUser'] >= 1)) {
				if (!empty($_GET['id'])) {
					$monFront = new controllerFront;
					$monFront->goDeleteAlert();
				} else {
					throw new Exception('Probleme ID');
				}
			} else {
				throw new Exception('Interdit');
			}
		}
	} else {
		$monFront = new controllerFront;
		$monFront->goHome();
	}
} catch (Exception $e) {
	$messageError = $e->getMessage();
	require('App/view/error.php');
}
