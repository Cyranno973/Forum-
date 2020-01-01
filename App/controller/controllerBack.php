<?php
namespace App\controller;

use \App\model\PostManager;
use \App\model\MembreManager;
use \App\model\CommentManager;
use \App\model\AlertManager;

class ControllerBack{


	function goCreateRubric()
	{
		$titleRubic = $_POST['nameRubric'];
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
		$varCreateRubric = $postManager->modelCreateRubric($fileDestination,$titleRubic);
		 
		header('location:index?action=listRubric');
	}

	function goUpdateRubric()
	{
		echo$_GET['id'];
		$postManager = new PostManager();
		$varCheckRubric = $postManager->modelCheckRubric($_GET['id']);
		 require('App/view/rubrics/updateRubric.php');
			
	
	}
	function goHandlingUpdateRubric()
	{
		echo$_GET['id'];
		echo$_POST['nameRubric'];
		echo$_FILES['file']['tmp_name'];

		$postManager = new PostManager();
	
		
			$varUpdateRubric = $postManager->modelUpdateRubric($_GET['id'], $_POST['nameRubric'], $_FILES['file']['tmp_name']);
		// header('location:index?action=goUpdateRubric');
	}

}