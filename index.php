<?php

require"vendor/autoload.php";

use \App\controller\ControllerFront;
use \App\controller\ControllerBack;

try {
	//si séssion n'existe pas je start
	if (!isset($_SESSION)) {
		session_start();
	}
	if(isset($_GET['admin'])){
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
		} elseif ($_GET['action'] == 'admin') {
			$monFront = new controllerFront;
			$monFront->goAdmin();
		}elseif ($_GET['action'] == 'inscription') {
			$monFront = new controllerFront;
			$monFront->inscription();
			
		}elseif ($_GET['action'] == 'deconnexion') {
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
			if (!empty($_SESSION['membre']) and  $_SESSION['powerUser'] == 1) {
				$monFront = new controllerFront;
					$monFront->golistMembres();
				
			} else {
				throw new Exception('Vous devez être administrateur  pour y acceder');
			}
		} elseif ($_GET['action'] == 'listComments') {
			if (!empty($_SESSION['membre']) and  $_SESSION['powerUser'] == 1) {
				$monFront = new controllerFront;
					$monFront->golistComments();
				
			} else {
				throw new Exception('Vous devez être administrateur  pour y acceder');
			}
		} elseif ($_GET['action'] == 'listAlerts') {
			if (!empty($_SESSION['membre']) and  $_SESSION['powerUser'] == 1) {
				$monFront = new controllerFront;
					$monFront->golistAlerts();
				
			} else {
				throw new Exception('Vous devez être administrateur  pour y acceder');
			}
		} 
		elseif ($_GET['action'] == 'goDeleteComment') {
			if (!empty($_SESSION['membre']) and  $_SESSION['powerUser'] == 1) {
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
			if (!empty($_SESSION['membre']) and  $_SESSION['powerUser'] == 1) {
				$monFront = new controllerFront;
					$monFront->goDeleteComment();
				
			} else {
				throw new Exception('Vous devez être administrateur  pour y acceder');
			}
		} elseif ($_GET['action'] == 'goDeleteAlert') {
			if ((!empty($_SESSION['membre'])) and  ($_SESSION['powerUser'] == 1)) {

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
} catch (Exception $e) {
	$messageError = $e->getMessage();
	require('App/view/error.php');
}





