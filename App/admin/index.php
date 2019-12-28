<?php
if (!isset($_SESSION)) {
	session_start();
}
require('controller/adController.php');

$adminaccount = golistadminaccount();

if (!empty($_SESSION['operator']) and ($adminaccount == true)) {


	if (isset($_GET['admin'])) {
		if ($_GET['admin'] == 'goAddInsciptionAdmin') {
			goAddInsciptionAdmin();
		} elseif ($_GET['admin'] == 'goDeconnexion') {
			goDeconnexion();
		} elseif ($_GET['admin'] == 'handlingInscriptionAdmin') {
			// $_POST['pseudoInscription']='admin';

			// if (!empty($_POST['passwordInscription']) and !empty($_POST['passwordInscription2']) and !empty($_POST['emailInscription'])) {
			// 	$_POST['passwordInscription'] = strip_tags($_POST['passwordInscription']);
			// 	$_POST['passwordInscription2'] = strip_tags($_POST['passwordInscription2']);
			// 	$_POST['emailInscription'] = strip_tags($_POST['emailInscription']);
			// 	handlingInscriptionAdmin();
			// 	// $pseudo = $_POST['pseudoInscription'];
			// 	// $password = $_POST['passwordInscription']; TODO a reutiliser en session
			// 	// $email = $_POST['emailInscription'];
			// 	// $power = $_POST['power'];	
			// } else {
			// 	echo 'echec index handlingInscriptionAdmin';
			// }
		} elseif ($_GET['admin'] == 'goLogin') {
			goLogin();
		} elseif ($_GET['admin'] == 'handlingUpdateOperator') {

			if (!empty($_GET['operatorid']) and !empty($_POST['pseudoConnect']) and !empty($_POST['passwordConnect'])  and !empty($_POST['emailConnect']) and !empty($_POST['power'])) {
				$_POST['pseudoConnect'] = strip_tags($_POST['pseudoConnect']);
				$_POST['passwordConnect'] = strip_tags($_POST['passwordConnect']);
				$_POST['emailConnect'] = strip_tags($_POST['emailConnect']);
				$_POST['power'] = strip_tags($_POST['power']);
				handlingUpdateOperator();
			} else {
				echo 'echec handlingUpdateOperator';
			}
		} elseif ($_GET['admin'] == 'goIndexView') {
			goIndexView();
		} elseif ($_GET['admin'] == 'goAddOperator') {
			goAddOperator();
		} elseif ($_GET['admin'] == 'handlingInscriptionOperator') {

			if (!empty($_POST['pseudoInscription']) and !empty($_POST['passwordInscription'])  and !empty($_POST['emailInscription']) and !empty($_POST['power'])) {
				$_POST['pseudoInscription'] = strip_tags($_POST['pseudoInscription']);
				$_POST['passwordInscription'] = strip_tags($_POST['passwordInscription']);
				$_POST['emailInscription'] = strip_tags($_POST['emailInscription']);
				$_POST['power'] = strip_tags($_POST['power']);
				handlingInscriptionOperator();
			} else {
				echo 'echec handlingInscriptionOperator';
			}
		} elseif ($_GET['admin'] == 'handlingInscriptionChapter') {

			if (!empty($_POST['titleChapter']) and !empty($_POST['chapterContent'])) {
				$_POST['titleChapter'] = strip_tags($_POST['titleChapter']);
				$_POST['chapterContent'] = strip_tags($_POST['chapterContent']);
				// echo $_POST['titleChapter'];
				// echo $_POST['chapterContent'];
				handlingInscriptionChapter();
			} else {
				echo 'echec handlingInscriptionChapter';
				$erreur = 'Votre document ou titre est vide';
			}
		} elseif ($_GET['admin'] == 'goAddChapter') {
			goAddChapter();
		} elseif ($_GET['admin'] == 'goDeleteMembre') {
			goDeleteMembre();
		} elseif ($_GET['admin'] == 'goDeleteOperator') {
			godeleteOperator();
		} elseif ($_GET['admin'] == 'goDeleteChapter') {
			godeleteChapter();
		} elseif ($_GET['admin'] == 'goDeleteAlert') {
			goDeleteAlert();
		} elseif ($_GET['admin'] == 'goDeleteComment') {
			goDeleteComment();
		} elseif ($_GET['admin'] == 'goListOperator') {
			goListOperator();
		} elseif ($_GET['admin'] == 'goListChapter') {
			goListChapter();
		} elseif ($_GET['admin'] == 'goListMembre') {
			goListMembre();
		} elseif ($_GET['admin'] == 'goListComment') {
			goListComment();
		} elseif ($_GET['admin'] == 'goListAlert') {
			goListAlert();
		} elseif ($_GET['admin'] == 'goUpdateOperator') {
			if (isset($_GET['operatorid']) and (!empty($_GET['operatorid']))) {
				goUpdateOperator();
			}
		} elseif ($_GET['admin'] == 'goUpdateMembre') {
			goUpdateMembre();
		} elseif ($_GET['admin'] == 'goUpdateChapter') {
			goUpdateChapter();
		} else {
			goPageNoFound();
		}
	} else {


		goLogin();
	}
} elseif (empty($_SESSION['operator']) and ($adminaccount == true)) {
	if (!empty($_POST['pseudoConnect']) and !empty($_POST['passwordConnect'])) {
		$_POST['pseudoConnect'] = strip_tags($_POST['pseudoConnect']);
		$_POST['passwordConnect'] = strip_tags($_POST['passwordConnect']);
		handlingLoginOperator();
	} else {
		goLogin();
	}
} else {
	session_unset();
	session_destroy();
	$_POST['pseudoInscription'] = 'admin';

	if (!empty($_POST['passwordInscription']) and !empty($_POST['passwordInscription2']) and !empty($_POST['emailInscription'])) {
		$_POST['passwordInscription'] = strip_tags($_POST['passwordInscription']);
		$_POST['passwordInscription2'] = strip_tags($_POST['passwordInscription2']);
		$_POST['emailInscription'] = strip_tags($_POST['emailInscription']);
		handlingInscriptionAdmin();
		// $pseudo = $_POST['pseudoInscription'];
		// $password = $_POST['passwordInscription']; TODO a reutiliser en session
		// $email = $_POST['emailInscription'];
		// $power = $_POST['power'];	
	} else {
		goAddInsciptionAdmin();
	}
}
