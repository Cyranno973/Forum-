<?php

namespace App\controller;

use \App\model\PostManager;
use \App\model\MembreManager;
use \App\model\CommentManager;
use \App\model\AlertManager;

class ControllerFront
{

    function goHome()
    {
        $postManager = new PostManager();
        $varListRubric = $postManager->modelListRubric();
        require('App/view/home.php');
    }
    function golistMembres()
    {
        $membreManager = new MembreManager();
        $varListMembres = $membreManager->modelListMembres();
        require('App/view/users/ListMembres.php');
    }
    function inscription()
    {
        require('App/view/users/inscription.php');
    }
    function verifyDuplicateInscription()
    {
        $membreManager = new MembreManager();
        $pseudoCheck =  $membreManager->checkPseudo($_POST['pseudoInscription']);
        if ($pseudoCheck == false) {
            echo 'yo';
            $membreManager->ajoutMembre($_POST['pseudoInscription'], $_POST['passwordInscription'], $_POST['emailInscription']);
            header('location:index.php');
        } else {
            $messageError = 'pseudo deja pris';
            require('App/view/error.php');
        }
    }
    function goListRubric()
    {
        $postManager = new PostManager();
        $varListRubric = $postManager->modelListRubric();
        require('App/view/rubrics/listRubric.php');
    }
    function goConnect()
    {
        require('App/view/users/connexion.php');
    }
    function goDeconnexion()
    {
        session_start();
        session_destroy();
        header('Location: index.php');
    }
    function verifyMembre()
    {
        $membreManager = new MembreManager();
        $membrePresent = $membreManager->checkMembre($_POST['pseudoConnect']);
        $isPasswordCorrect = password_verify($_POST['passwordConnect'], $membrePresent['pass']);
        if ($isPasswordCorrect) {
            $_SESSION['membre'] = $_POST['pseudoConnect'];
            $_SESSION['idUser'] = $membrePresent['id'];
            $_SESSION['powerUser'] = $membrePresent['droitUser'];
            header('location:index.php');
        } else {
            $messageError = 'Login ou mot de passe incorrect';
            require('App/view/error.php');
        }
    }
    function golistComments()
    {
        $commentManager = new CommentManager();
        $allComments = $commentManager->modelListComments();
        require('App/view/comments/listComments.php');
    }
    function addcomment()
    {
        $commentManager = new CommentManager();
        $insertComment = $commentManager->ajoutComment($_SESSION['idUser'], $_GET['id'], $_POST['message']);
        header('location:index.php?action=goSelectSujet&id=' . $_GET['id'] . '&page=' . $_GET['page']);
    }
    function goDeleteComment()
    {
        $commentManager = new CommentManager();
        $varDeleteComment = $commentManager->modelDeleteComment($_GET['id']);
        header('location:index.php?action=listComments');
    }
    function goAddAlert()
    {
        echo $_GET['id_sujet'];
        $alertManager = new AlertManager();
        $varAddAlert = $alertManager->modelAddAlert($_GET['idcomment'], $_SESSION['idUser']);
        header('location:index.php?action=goSelectSujet&id=' . $_GET['id_sujet']);
        //  header("location:index.php?action=goFilterSujet&id=".$_GET['id_sujet']);
    }
    function golistAlerts()
    {
        $alertManager = new AlertManager();
        $allAlerts = $alertManager->modelListAlerts();
        require('App/view/alerts/listAlerts.php');
    }
    function goDeleteAlert()
    {
        $alertManager = new AlertManager();
        $alert = 0;
        $varDeleteAlert = $alertManager->modelDeleteAlert($_GET['id'], $alert);
        header('location:index.php?action=listAlerts');
    }
    function errorPage()
    {
        require('App/view/error.php');
    }
}
