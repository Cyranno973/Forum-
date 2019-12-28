<?php
require"vendor/autoload.php";
try {
	//si séssion n'existe pas je start
	if (!isset($_SESSION)) {
		session_start();
	}
	require('app/controller/controller.php');

	if (isset($_GET['action'])) {
		if ($_GET['action'] == 'showChapters') {
			allChapters();
		} elseif ($_GET['action'] == 'showChapter') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				selectionChapter();
			} else {
				throw new Exception('id  perdu introuvabble');
			}
		} elseif ($_GET['action'] == 'inscription') {
			inscription();
		} elseif ($_GET['action'] == 'inscriptionTraitement') {

			if (!empty($_POST['pseudoInscription']) and !empty($_POST['passwordInscription']) and !empty($_POST['passwordInscription2']) and !empty($_POST['emailInscription'])) {
				$_POST['pseudoInscription'] = strip_tags($_POST['pseudoInscription']);
				$_POST['passwordInscription'] = strip_tags($_POST['passwordInscription']);
				$_POST['passwordInscription2'] = strip_tags($_POST['passwordInscription2']);
				$_POST['emailInscription'] = strip_tags($_POST['emailInscription']);
				if ($_POST['passwordInscription'] == $_POST['passwordInscription2']) {

					verifyDuplicateInscription();
				}
			} else {

				inscription();
			}
		} elseif ($_GET['action'] == 'traitementMembre') {

			if (!empty($_POST['pseudoConnect']) and !empty($_POST['passwordConnect'])) {
				$_POST['pseudoConnect'] = strip_tags($_POST['pseudoConnect']);
				$_POST['passwordConnect'] = strip_tags($_POST['passwordConnect']);
				verifyMembre();
			} else {
				goConnect();
			}
		} elseif ($_GET['action'] == 'ajoutComment') {
			if (!empty($_POST['message'])) {
				$_POST['message'] = htmlspecialchars($_POST['message']);
				if (!empty($_SESSION['membre'])) {
					addComment();
				} else {
					throw new Exception('Veuillez vous connectez');
				}
			} else {

				$messageError = 'veuillez inserez un message';
				require('view/error.php');
			}
		} elseif ($_GET['action'] == 'connexion') {
			goConnect();
		}/* elseif ($_GET['action'] == 'admin') {
		 	goAdmin();
		}*/ elseif ($_GET['action'] == 'listChapters') {
			if (!empty($_SESSION['membre']) and  $_SESSION['powerUser'] == 1) {
				golistChapters();
			} else {
				throw new Exception('Vous devez être administrateur  pour y acceder');
			}
		} elseif ($_GET['action'] == 'addChapters') {
			if (!empty($_SESSION['membre']) and  $_SESSION['powerUser'] == 1) {
				goAddChapters();
			} else {
				throw new Exception('Vous devez être administrateur  pour y acceder');
			}
		} elseif ($_GET['action'] == 'handlingInscriptionChapter') {
			if ((!empty($_SESSION['membre']) and  ($_SESSION['powerUser'] == 1))) {
				if (!empty($_POST['titleChapter']) and !empty($_POST['chapterContent'])) {
					$_POST['titleChapter'] = htmlspecialchars($_POST['titleChapter']);
					
					handlingInscriptionChapter();
				} else {

					throw new Exception('Votre document ou titre est vide');
				}
			} else {
				throw new Exception('Vous devez être administrateur  pour y acceder');
			}
		} elseif ($_GET['action'] == 'addAlert') {
			if ((!empty($_GET['idcomment'])) and (!empty($_SESSION['idUser']))) {
				
				goAddAlert();
			}
		} elseif ($_GET['action'] == 'goUpdateChapter') {
			if (!empty($_SESSION['membre']) and  $_SESSION['powerUser'] == 1) {
				if (!empty($_GET['id'])) {
					goUpdateChapter();
				}
			} else {
				throw new Exception('Vous devez être administrateur  pour y acceder');
			}
		} elseif ($_GET['action'] == 'handlingUpdateChapter') {
			if (!empty($_SESSION['membre']) and  $_SESSION['powerUser'] == 1) {
				if (!empty($_GET['id'])) {
					gohandlingUpdateChapter();
				}
			} else {
				throw new Exception('Vous devez être administrateur  pour y acceder');
			}
		} elseif ($_GET['action'] == 'listMembres') {
			if (!empty($_SESSION['membre']) and  $_SESSION['powerUser'] == 1) {
				golistMembres();
			} else {
				throw new Exception('Vous devez être administrateur  pour y acceder');
			}
		} elseif ($_GET['action'] == 'listComments') {
			if (!empty($_SESSION['membre']) and  $_SESSION['powerUser'] == 1) {
				golistComments();
			} else {
				throw new Exception('Vous devez être administrateur  pour y acceder');
			}
		} elseif ($_GET['action'] == 'listAlerts') {
			if (!empty($_SESSION['membre']) and  $_SESSION['powerUser'] == 1) {
				golistAlerts();
			} else {
				throw new Exception('Vous devez être administrateur  pour y acceder');
			}
		} 
		elseif ($_GET['action'] == 'goDeleteComment') {
			if (!empty($_SESSION['membre']) and  $_SESSION['powerUser'] == 1) {
				goDeleteComment();
			} else {
				throw new Exception('Vous devez être administrateur  pour y acceder');
			}
		} elseif ($_GET['action'] == 'goDeleteChapter') {
			if (!empty($_SESSION['membre']) and  $_SESSION['powerUser'] == 1) {
				goDeleteChapter();
			} else {
				throw new Exception('Vous devez être administrateur  pour y acceder');
			}
		} elseif ($_GET['action'] == 'goDeleteComment') {
			if (!empty($_SESSION['membre']) and  $_SESSION['powerUser'] == 1) {
				goDeleteComment();
			} else {
				throw new Exception('Vous devez être administrateur  pour y acceder');
			}
		} elseif ($_GET['action'] == 'goDeleteAlert') {
			if ((!empty($_SESSION['membre'])) and  ($_SESSION['powerUser'] == 1)) {

				if (!empty($_GET['id'])) {
					goDeleteAlert();
					
				} else {
					throw new Exception('Vous devez être administrateur  pour y acceder');
				}
			}
		}
	} else {
		allChapters();
	}
} catch (Exception $e) {

	$messageError = $e->getMessage();
	require('view/error.php');
}





