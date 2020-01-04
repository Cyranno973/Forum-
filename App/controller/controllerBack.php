<?php
namespace App\controller;

use \App\model\PostManager;
use \App\model\MembreManager;
use \App\model\CommentManager;
use \App\model\AlertManager;

class ControllerBack{


	function goAddOperator()
	{
		require('App/view/users/createOperator.php');
	}
	function handlingInscriptionOperator()
	{
		$membreManager = new MembreManager();
    
		$varPseudoCheck = $membreManager->modelPseudoCheckOperator($_POST['pseudoInscription']);
		if ($varPseudoCheck == false) {
			$varModelHandlingInscriptionOperator = $membreManager->modelHandlingInscriptionOperator(
				$pseudo = $_POST['pseudoInscription'],
				$password = $_POST['passwordInscription'],
				$email = $_POST['emailInscription'],
				$power = $_POST['power']
			);
			if ($varModelHandlingInscriptionOperator) {
					$info = 'utilsateur ajouter avec succes';
					echo$info;
				 require('App/view/users/createOperator.php');
			}
		} else {
			$info = 'utilsateur déja existant.';
	echo$info;
			// require('App/view/users/createOperator.php');
		}
	}
	function goUpdateOperator()
	{
		$membreManager = new MembreManager();
	
		$varModelGetInfoOperator = $membreManager->modelGetInfoOperator($_GET['id']);
		//$varModelUpdateOperator = modelUpdateOperator();
		if ($varModelGetInfoOperator) {
	
			require('App/view/users/updateMembre.php');
		}
	}
	function handlingUpdateOperator()
	{
		$membreManager = new MembreManager();
		$varPseudoCheck = $membreManager->modelinfoUpdateOperator($_GET['id']);
		$varPseudo = false;
	
		foreach ($varPseudoCheck as $data) {
			if ($data['pseudo'] == $_POST['pseudoConnect']) {
				$varPseudo = true;
				echo 'pseudo existant';
			}
		}
		$varPassCheck = $membreManager->modelPassUpdateOperator($_GET['id']);
		$varPass = false;
		foreach ($varPassCheck as $data) {
	
			if ($_POST['passwordConnect'] != $data['pass']) {
				$_POST['passwordConnect'] = password_hash($_POST['passwordConnect'], PASSWORD_DEFAULT);
				echo 'password modifier';
			}
		}
	
		if ($varPseudo == false) {
			$varModelHandlingUpdateOperator = $membreManager->modelHandlingUpdateOperator($id = $_GET['id'], $pseudo = $_POST['pseudoConnect'], $password = $_POST['passwordConnect'], $email = $_POST['emailConnect'], $power = $_POST['power']);
			if ($varModelHandlingUpdateOperator) {
				header('location:index.php?action=listMembres');
			}
		} else {
			$info = 'utilsateur déja existant.';
	
			require('view/update/adUpdateOperator.php');
		}
	}
	




	function goCreateSujet()
	{
		$postManager = new PostManager();
		$varCreateSujet = $postManager->modelCreateSujet( $_POST['nameSujet'], $_SESSION['idUser'], $_POST['sujetContent'],$_POST['fname']);
		 header('location:index?action=listSujet');
	}

	function goUpdateSujet()
	{
		
		$postManager = new PostManager();
		$varListSujet = $postManager->modelListSujet();
		$varListRubric = $postManager->modelListRubric();
		$varRubricUser = $postManager->modelRubricUser($_GET['id']);

		$varCheckRubric = $postManager->modelCheckSujet($_GET['id']);
		 require('App/view/sujets/updateSujet.php');
	}
	function goHandlingUpdateSujet()
	{
		
		$postManager = new PostManager();
		// echo$_GET['id'];
		// echo $_POST['nameSujet'];
		// echo$_SESSION['idUser'];
		// echo$_POST['sujetContent'];
		// echo$_POST['fname'];
		$varHandlingUpdateSujet = $postManager->modelHandlingUpdateSujet( $_GET['id'], $_POST['nameSujet'], $_SESSION['idUser'], $_POST['sujetContent'],$_POST['fname']);
		print_r($varHandlingUpdateSujet);
		header('location:index?action=listSujet');
	}

	function goListSujet()
	{
	
		$postManager = new PostManager();
		$varListRubric = $postManager->modelListRubric();
		$varListSujet = $postManager->modelListSujet();
	
		
		  require('App/view/sujets/listSujet.php');
	}
	function goFilterSujet()
	{

		$postManager = new PostManager();
		$varFilterSujet = $postManager->modelFilterSujet($_GET['id']);
// print_r($varFilterSujet);
		  require('App/view/sujets/filterSujet.php');
	}
	function goSelectSujet()
	{
		$postManager = new PostManager();
		$pageCourante=$_GET['page'];
		$nbrCommentsByPages = 5;
		$firstCommentPage = ($pageCourante-1)*$nbrCommentsByPages;
		echo$pageCourante;
		
		$varCommentSujet = $postManager->modelGetComments($_GET['id'],$firstCommentPage,$nbrCommentsByPages);
		$varSelectSujet = $postManager->modelSelectSujet($_GET['id']);
		$varNbrCommentsTotales = $postManager->modelNbrCommentsTotales($_GET['id']);
		//  print_r($varNbrCommentsTotales);
		
		$nbPage = ceil($varNbrCommentsTotales / $nbrCommentsByPages);
		if($_GET['page'] > $nbPage){
		$current =$nbPage;
		}
		else{
			$current = $_GET['page'];
		}

		
		// $varAllcomments = $postManager->modelAllcomments($_GET['id'], $firstCommentPage, $nbrCommentsByPages);
		//   print_r($varAllcomments);
		//  echo $varAllcomments['comment'];
		
		// print_r($varSelectSujet);
	
    //  print_r($varCommentSujet);
		        require('App/view/sujets/selectSujet.php');
	}


	function goCreateRubric()
	{
		$titleRubric = $_POST['nameRubric'];
		$file = $_FILES['file'];
		$fileName = $_FILES['file']['name'];
		$fileTmpName = $_FILES['file']['tmp_name'];
		$fileSize = $_FILES['file']['size'];
		$fileError = $_FILES['file']['error'];
		$fileType = $_FILES['file']['type'];


		// echo$titleRubric = $_POST['nameRubric'];
		// print_r($_FILES['file']);
		// echo$fileName = $_FILES['file']['name'];
		// echo$fileTmpName = $_FILES['file']['tmp_name'];
		// echo$fileSize = $_FILES['file']['size'];
		// echo$fileError = $_FILES['file']['error'];
		// echo$fileType = $_FILES['file']['type'];


		$fileExt = explode('.', $fileName);
		$fileActualExt = strtolower(end($fileExt));
		$allowed = array('jpg', 'jpeg', 'png');
		if (in_array($fileActualExt, $allowed)) {
			if ($fileError === 0) {
				if ($fileSize < 24200000) {
					$fileNameNew = uniqid('', true) . "." . $fileActualExt;
					$fileDestination = 'App/public/img/' . $fileNameNew;
					move_uploaded_file($fileTmpName, 	$fileDestination);
					
				} else {
					echo "Votre fichier est trop grand";
				}
			} else {
				echo "Il y a une erreur lors de l'upload!";
			}
		} else {
			echo 'Vous ne pouvez pas mettre ce type de fichier';
		}
		$postManager = new PostManager();
		$varCreateRubric = $postManager->modelCreateRubric($fileDestination,$titleRubric);
		 
		header('location:index?action=listRubric');
	}

	function goUpdateRubric()
	{
		
		$postManager = new PostManager();
		$varListRubric = $postManager->modelListRubric();
		$varCheckRubric = $postManager->modelCheckRubric($_GET['id']);
		 require('App/view/rubrics/updateRubric.php');
	}
	function goHandlingUpdateRubric()
	{
		$titleRubric = $_POST['nameRubric'];
		$file = $_FILES['file'];
		$fileName = $_FILES['file']['name'];
		$fileTmpName = $_FILES['file']['tmp_name'];
		$fileSize = $_FILES['file']['size'];
		$fileError = $_FILES['file']['error'];
		$fileType = $_FILES['file']['type'];

		$fileExt = explode('.', $fileName);
		$fileActualExt = strtolower(end($fileExt));
		$allowed = array('jpg', 'jpeg', 'png');
		if (in_array($fileActualExt, $allowed)) {
			if ($fileError === 0) {
				if ($fileSize < 5000000) {
					$fileNameNew = uniqid('', true) . "." . $fileActualExt;
					$fileDestination = 'App/public/img/' . $fileNameNew;
					move_uploaded_file($fileTmpName, 	$fileDestination);
					
				} else {
					echo "Votre fichier est trop grand";
				}
			} else {
				echo "Il y a une erreur lors de l'upload!";
			}
		} else {
			echo 'Vous ne pouvez pas mettre ce type de fichier';
		}
		$postManager = new PostManager();
			$varUpdateRubric = $postManager->modelUpdateRubric($_GET['id'], $titleRubric, $fileDestination);
		header('location:index?action=listRubric');
	}
	function goDeleteRubric()
{
    $postManager = new PostManager();
    $varDeleteRubric = $postManager->modelDeleteRubric($_GET['id']);
    header('location:index?action=listRubric');
}
function goDeleteSujet()
{
    
    $postManager = new PostManager();
    $varDeleteSujet = $postManager->modelDeleteSujet($_GET['id']);
    header('location:index?action=listSujet');
}
function goDeleteUser()
{
    
    $membreManager = new MembreManager();
    $varDeleteMembre = $membreManager->modelDeleteUser($_GET['id']);
    header('location:index?action=listMembres');
}

}