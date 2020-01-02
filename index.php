<?php

require "vendor/autoload.php";

use \App\controller\ControllerFront;
use \App\controller\ControllerBack;

try {
	//si séssion n'existe pas je start
	if (!isset($_SESSION)) {
		session_start();
	}
	if (isset($_GET['admin'])) {
		header('location:admin/index.php?admin');
	}



	if (isset($_GET['action'])) {
		if ($_GET['action'] == 'showChapters') {
			$monFront = new controllerFront;
			$monFront->allChapters();
		} elseif ($_GET['action'] == 'showChapter') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				$monFront = new controllerFront;
				$monFront->selectionChapter();
			} else {
				throw new Exception('id  perdu introuvabble');
			}
		} elseif ($_GET['action'] == 'goFilterSujet') {
			$monBack = new controllerBack;
			$monBack->gofilterSujet();
		} elseif ($_GET['action'] == 'goSelectSujet') {
			$monBack = new controllerBack;
			$monBack->goSelectSujet();
		} elseif ($_GET['action'] == 'listSujet') {
			$monBack = new controllerBack;
			$monBack->goListSujet();
		} elseif ($_GET['action'] == 'goUpdateSujet') {

			$monBack = new controllerBack;
			$monBack->goUpdateSujet();
		} elseif ($_GET['action'] == 'listRubric') {
			$monFront = new controllerFront;
			$monFront->goListRubric();
		} elseif ($_GET['action'] == 'createSujet') {
			if ((!empty($_SESSION['membre']))) {
				if (!empty($_POST['nameSujet']) and !empty($_POST['sujetContent']) and !empty($_POST['fname'])) {
					$_POST['nameSujet'] = htmlspecialchars($_POST['nameSujet']);
					// echo$_POST['fname'];
					$monBack = new controllerBack;
					$monBack->goCreateSujet();
				} else {

					throw new Exception('Votre document ou titre est vide');
				}
			} else {
				throw new Exception('Vous devez être membre  pour y acceder');
			}
		} elseif ($_GET['action'] == 'goHandlingUpdateSujet') {
			if ((!empty($_SESSION['membre']))) {
				if (!empty($_POST['nameSujet']) and !empty($_POST['sujetContent']) and !empty($_POST['fname'])) {
					$_POST['nameSujet'] = htmlspecialchars($_POST['nameSujet']);
					//    echo $_GET['id'];
					//    echo $_POST['nameSujet'];
					//    echo  $_SESSION['idUser'];
					//    echo $_POST['sujetContent'];
					//    echo$_POST['fname'];


					$monBack = new controllerBack;
					$monBack->goHandlingUpdateSujet();
				} else {

					throw new Exception('Votre document ou titre est vide');
				}
			} else {
				throw new Exception('Vous devez être membre  pour y acceder');
			}
		} elseif ($_GET['action'] == 'createRubric') {
			if (!empty($_POST['nameRubric']) and !empty($_FILES['file'])) {
				// print_r($_FILES['file']);
				$monBack = new controllerBack;
				$monBack->goCreateRubric();
			} else {
				throw new Exception('Veuillez vous ');
			}
		} elseif ($_GET['action'] == 'goUpdateRubric') {

			if (isset($_GET['id']) && $_GET['id'] > 0) {

				$monBack = new controllerBack;
				$monBack->goUpdateRubric();
			} else {
				throw new Exception('Veuillez vous aza1 ');
			}
		} elseif ($_GET['action'] == 'goDeleteRubric') {

			if (isset($_GET['id']) && $_GET['id'] > 0) {

				$monBack = new controllerBack;
				$monBack->goDeleteRubric();
			} else {
				throw new Exception('Veuillez vous aza1 ');
			}
		} elseif ($_GET['action'] == 'goDeleteSujet') {

			if (isset($_GET['id']) && $_GET['id'] > 0) {

				$monBack = new controllerBack;
				$monBack->goDeleteSujet();
			} else {
				throw new Exception('Veuillez vous aza5 ');
			}
		} elseif ($_GET['action'] == 'goHandlingUpdateRubric') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				$monBack = new controllerBack;

				$monBack->goHandlingUpdateRubric();
			} else {
				throw new Exception('Veuillez vous aza2 ');
			}
		} elseif ($_GET['action'] == 'admin') {
			$monFront = new controllerFront;
			$monFront->goAdmin();
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
				$monFront->inscription();
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
			if (!empty($_POST['message'])) {

				$_POST['message'] = htmlspecialchars($_POST['message']);
				if (!empty($_SESSION['membre'])) {

					$monFront = new controllerFront;
					$monFront->addComment();
				} else {
					throw new Exception('Veuillez vous connectez');
				}
			} else {

				$messageError = 'veuillez inserez un message';
				require('App/view/error.php');
			}
		} elseif ($_GET['action'] == 'connexion') {
			$monFront = new controllerFront;
			$monFront->goConnect();
		} elseif ($_GET['action'] == 'listChapters') {
			if (!empty($_SESSION['membre']) and  $_SESSION['powerUser'] == 1) {
				$monFront = new controllerFront;
				$monFront->golistChapters();
			} else {
				throw new Exception('Vous devez être administrateur  pour y acceder');
			}
		} elseif ($_GET['action'] == 'addChapters') {
			if (!empty($_SESSION['membre']) and  $_SESSION['powerUser'] == 1) {
				$monFront = new controllerFront;
				$monFront->goAddChapters();
			} else {
				throw new Exception('Vous devez être administrateur  pour y acceder');
			}
		} elseif ($_GET['action'] == 'handlingInscriptionChapter') {
			if ((!empty($_SESSION['membre']) and  ($_SESSION['powerUser'] == 1))) {
				if (!empty($_POST['titleChapter']) and !empty($_POST['chapterContent'])) {
					$_POST['titleChapter'] = htmlspecialchars($_POST['titleChapter']);

					$monFront = new controllerFront;
					$monFront->handlingInscriptionChapter();
				} else {

					throw new Exception('Votre document ou titre est vide');
				}
			} else {
				throw new Exception('Vous devez être administrateur  pour y acceder');
			}
		} elseif ($_GET['action'] == 'addAlert') {
			if ((!empty($_GET['idcomment'])) and (!empty($_SESSION['idUser']))) {
				$monFront = new controllerFront;
				$monFront->goAddAlert();
			}
		} elseif ($_GET['action'] == 'goUpdateChapter') {
			if (!empty($_SESSION['membre']) and  $_SESSION['powerUser'] == 1) {
				if (!empty($_GET['id'])) {
					$monFront = new controllerFront;
					$monFront->goUpdateChapter();
				}
			} else {
				throw new Exception('Vous devez être administrateur  pour y acceder');
			}
		} elseif ($_GET['action'] == 'handlingUpdateChapter') {
			if (!empty($_SESSION['membre']) and  $_SESSION['powerUser'] == 1) {
				if (!empty($_GET['id'])) {
					$monFront = new controllerFront;
					$monFront->gohandlingUpdateChapter();
				}
			} else {
				throw new Exception('Vous devez être administrateur  pour y acceder');
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
			}
		} elseif ($_GET['action'] == 'goDeleteComment') {
				if (!empty($_SESSION['membre']) and  $_SESSION['powerUser'] >= 1) {
					$monFront = new controllerFront;
					$monFront->goDeleteComment();
				} else {
					throw new Exception('Vous devez être administrateur  pour y acceder');
				}
		} elseif ($_GET['action'] == 'goDeleteChapter') {
				if (!empty($_SESSION['membre']) and  $_SESSION['powerUser'] == 1) {
					$monFront = new controllerFront;
					$monFront->goDeleteChapter();
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
		} elseif ($_GET['action'] == 'goAddOperator') {
		} elseif ($_GET['action'] == 'goDeleteUser') {
				echo 'yoo';
				if (!empty($_SESSION['membre']) and $_SESSION['powerUser'] >= 1) {

					$monBack = new controllerBack;
					 $monBack->goDeleteUser();
				} else {
					throw new Exception('Vous devez être administrateur  pour y acceder');
				}
			} elseif ($_GET['action'] == 'goAddOperator') {
				goAddOperator();
				// TODO AJOUTER MEMMBRE
			} elseif ($_GET['action'] == 'goDeleteAlert') {
				if ((!empty($_SESSION['membre'])) and  ($_SESSION['powerUser'] >= 1)) {

					if (!empty($_GET['id'])) {
						$monFront = new controllerFront;
						$monFront->goDeleteAlert();
					} else {
						throw new Exception('Vous devez être administrateur  pour y acceder');
					}
				}
			}
		} else {
			$monFront = new controllerFront;
			$monFront->goHome();
		}
	}
 catch (Exception $e) {
	$messageError = $e->getMessage();
	require('App/view/error.php');
}
