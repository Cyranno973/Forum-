<?php
require('model/adModel.php');

// function goLogin()
// {
// 	echo 'logggggggin';
// 	require('view/adLogin.php');
// }

function golistadminaccount()
{
	$accountexist = listadminaccount();
	return $accountexist;
}

function goAddInsciptionAdmin()
{
	$varModelAddInsciptionAdmin = modelAddInsciptionAdmin();
	if ($varModelAddInsciptionAdmin) {
		require('view/add/adInsciptionAdmin.php');
	}
}

function handlingInscriptionAdmin()
{
	$varPseudoCheck = modelPseudoCheckAdmin($_POST['pseudoInscription']);

	if ($varPseudoCheck == false) {
		$varModelHandlingInscriptionAdmin = modelHandlingInscriptionAdmin(
			$pseudo = $_POST['pseudoInscription'],
			$password = $_POST['passwordInscription2'],
			$email = $_POST['emailInscription']


		);
		if ($varModelHandlingInscriptionAdmin) {
			header('location:index.php');
		}
	} else {
		$erreur = 'Pseudo déja utilisé.';
		require('view/add/adInsciptionAdmin.php');
	}
}

// function verifyLogin()
// {
// 	$varVerifyPasswordUser = modelVerifyLogin($_POST['pseudoConnect'], $_POST['passwordConnect']);
// 	$varVerifyPasswordUser = password_verify($_POST['passwordConnect'], $varVerifyLogin['pass']);
// 	if ($varVerifyPasswordUser) {
// 		$_SESSION['membre'] = $_POST['pseudoConnect'];
// 		$_SESSION['idUser'] = $varVerifyPasswordUser['id'];
// 		$_SESSION['powerUser'] = $varVerifyPasswordUser['droitUser'];
// 		header('location:index.php');
// 	}
// }
function goLogin()
{
	$varModelLogin = modelLogin();
	if ($varModelLogin) {
		// if(isset($_GET['error']) AND ($_GET['error'] == 2)){$erreur ='login mot de passe inccorect';}
		require('view/adLogin.php');
	}
}
function goDeconnexion()
{
	echo "lol";
	require('view/adDeconnexion.php');
}
function goAddOperator()
{
	require('view/add/adAddOperator.php');
}
function handlingInscriptionOperator()
{
	$varPseudoCheck = modelPseudoCheckOperator($_POST['pseudoInscription']);
	if ($varPseudoCheck == false) {
		$varModelHandlingInscriptionOperator = modelHandlingInscriptionOperator(
			$pseudo = $_POST['pseudoInscription'],
			$password = $_POST['passwordInscription'],
			$email = $_POST['emailInscription'],
			$power = $_POST['power']
		);
		if ($varModelHandlingInscriptionOperator) {
			$info = 'utilsateur ajouter avec succes';
			require('view/add/adAddOperator.php');
		}
	} else {
		$info = 'utilsateur déja existant.';

		require('view/add/adAddOperator.php');
	}
}
function goIndexView()
{
	$varModelIndexView = modelIndexView();
	if ($varModelIndexView) {

		require('view/adIndexView.php');
	}
}
function goAddChapter()
{
	require('view/add/adChapter.php');
}
function handlingInscriptionChapter()
{
	$varModelHandlingInscriptionChapter = modelHandlingInscriptionChapter($_POST['titleChapter'], $_POST['chapterContent']);
	if ($varModelHandlingInscriptionChapter) {

		require('view/add/adChapter.php');
	}
}
function handlingLoginOperator()
{
	$varOperatorPresent =  modelHandlingLoginOperator($_POST['pseudoConnect']);
	$testPasswordOperator = password_verify($_POST['passwordConnect'], $varOperatorPresent['pass']);
	if ($testPasswordOperator) {
		$_SESSION['operator'] = $_POST['pseudoConnect'];
		$_SESSION['operatoridUser'] = $varOperatorPresent['id'];
		$_SESSION['operatorPowerUser'] = $varOperatorPresent['power'];
		header('location:index.php?admin=goIndexView');
	} else {

		header('location:index.php?erreur=Login ou Mot de passe incorrect');
	}
}

function handlingUpdateOperator()
{
	$varPseudoCheck = modelinfoUpdateOperator($_GET['operatorid']);
	$varPseudo = false;

	foreach ($varPseudoCheck as $data) {
		if ($data['name'] == $_POST['pseudoConnect']) {
			$varPseudo = true;
			echo 'pseudo existant';
		}
	}
	$varPassCheck = modelPassUpdateOperator($_GET['operatorid']);
	$varPass = false;
	foreach ($varPassCheck as $data) {

		if ($_POST['passwordConnect'] != $data['pass']) {
			$_POST['passwordConnect'] = password_hash($_POST['passwordConnect'], PASSWORD_DEFAULT);
			echo 'password modifier';
		}
	}

	if ($varPseudo == false) {
		$varModelHandlingUpdateOperator = modelHandlingUpdateOperator($id = $_GET['operatorid'], $pseudo = $_POST['pseudoConnect'], $password = $_POST['passwordConnect'], $email = $_POST['emailConnect'], $power = $_POST['power']);
		if ($varModelHandlingUpdateOperator) {
			header('location:index.php?admin=goListOperator');
		}
	} else {
		$info = 'utilsateur déja existant.';

		require('view/update/adUpdateOperator.php');
	}
}

function goDeleteMembre()
{
	$varModelDeleteMembre = modelDeleteMembre();
	if ($varModelDeleteMembre) {

		require('view/delete/adDeleteMembre.php');
	}
}
function goDeleteOperator()
{
	$varModeldeleteOperator = modeldeleteOperator();
	if ($varModeldeleteOperator) {

		require('view/delete/adDeleteOperator.php');
	}
}
function goDeleteChapter()
{
	$varModeldeleteChapter = modeldeleteChapter();
	if ($varModeldeleteChapter) {

		require('view/delete/adDeleteChapter.php');
	}
}
function goListOperator()
{
	$varModelListOperator = modelListOperator();
	if ($varModelListOperator) {

		require('view/list/adListOperator.php');
	}
}

function goListMembre()
{
	$varModelListMembre = modelListMembre();
	if ($varModelListMembre) {

		require('view/list/adListMembre.php');
	}
}
function goListChapter()
{
	$varModelListChapter = modelListChapter();
	if ($varModelListChapter) {

		require('view/list/adListChapter.php');
	}
}
function goListComment()
{
	$varModelListComment = modelListComment();
	if ($varModelListComment) {
		require('view/list/adListComment.php');
	}
}
function goListAlert()
{
	$varModelListAlert = modelListAlert();
	if ($varModelListAlert) {

		require('view/list/adListAlert.php');
	}
}
function goDeleteComment()
{
	$varModelDeleteComment = modelDeleteComment();
	if ($varModelDeleteComment) {

		require('view/delete/adDeleteComment.php');
	}
}
function goDeleteAlert()
{
	$varModelDeleteAlert = modelDeleteAlert();
	if ($varModelDeleteAlert) {

		require('view/delete/adDeleteAlert.php');
	}
}
function goUpdateOperator()
{
	$varModelGetInfoOperator = modelGetInfoOperator($_GET['operatorid']);
	//$varModelUpdateOperator = modelUpdateOperator();
	if ($varModelGetInfoOperator) {

		require('view/update/adUpdateOperator.php');
	}
}
function goUpdateMembre()
{
	$varModelUpdateMembre = modelUpdateMembre();
	if ($varModelUpdateMembre) {

		require('view/update/adUpdateMembre.php');
	}
}
function goUpdateChapter()
{
	$varModelUpdateChapter = modelUpdateChapter();
	if ($varModelUpdateChapter) {

		require('view/update/adUpdateChapter.php');
	}
}

function goPageNoFound()
{
	require('view/error/adPageNoFound.php');
}
