<?php
require_once('app/model/PostManager.php');
require_once('app/model/CommentManager.php');
require_once('app/model/MembreManager.php');
require_once('app/model/AlertManager.php');


function golistMembres()
{
    $membreManager = new MembreManager();
    $varListMembres = $membreManager->modelListMembres();
    require('view/ListMembres.php');
}
function inscription()
{
    require('view/inscription.php');
}
function verifyDuplicateInscription()
{
    $membreManager = new MembreManager();
    $pseudoCheck =  $membreManager->checkPseudo($_POST['pseudoInscription']);
    if ($pseudoCheck == false) {
        $membreManager->ajoutMembre($_POST['pseudoInscription'], $_POST['passwordInscription'], $_POST['emailInscription']);
        header('location:index.php');
    } else {
        $messageError = 'pseudo deja pris';
        require('view/error.php');
    }
}
function goConnect()
{
    require('view/connexion.php');
}
function verifyMembre()
{
    $membreManager = new MembreManager();
    $membrePresent = $membreManager->checkMembre($_POST['pseudoConnect']);
    $isPasswordCorrect = password_verify($_POST['passwordConnect'], $membrePresent['pass']);
    echo $isPasswordCorrect;
    if ($isPasswordCorrect) {
        $_SESSION['membre'] = $_POST['pseudoConnect'];
        $_SESSION['idUser'] = $membrePresent['id'];
        $_SESSION['powerUser'] = $membrePresent['droitUser'];
        header('location:index.php');
    } else {
        $messageError = 'Login ou mot de passe incorrect';
        require('view/error.php');
    }
}


function allChapters()
{
    // allChapters recoit la valeur du return getChapters
    $postManager = new PostManager();
    $varAllChapters = $postManager->getChapters();
    require('app/view/indexView.php');
}
function selectionChapter()
{
    $postManager = new PostManager();
    //selectionChapter recoit la valeur du return
    $selectionChapter = $postManager->getChapter($_GET['id']);
    $chapterId = $_GET['id'];
    $commentsChapter = $postManager->getcomments($_GET['id']);
    require('view/indexChapter.php');
}
function golistChapters()
{
    $postManager = new PostManager();
    $varListChapters = $postManager->modelListChapters();
    require('view/ListChapters.php');
}
function goAddChapters()
{
    require('view/addChapter.php');
}
function handlingInscriptionChapter()
{
    $postManager = new PostManager();
    $varModelHandlingInscriptionChapter =  $postManager->modelHandlingInscriptionChapter($_POST['titleChapter'], $_POST['chapterContent']);
    if ($varModelHandlingInscriptionChapter) {
        header('location:index.php?action=listChapters');
    }
}
function goUpdateChapter()
{
    $postManager = new PostManager();
    $varTitleCheck = $postManager->modelinfoUpdateChapter($_GET['id']);
    $varInfochapter = false;
    require('view/UpdateChapter.php');
}
function gohandlingUpdateChapter()
{
    $postManager = new PostManager();
    $varModelUpdateChapter = $postManager->modelUpdateChapter($_GET['id'], $_POST['titleChapter'], $_POST['chapterContent']);
    header('location:index.php?action=listChapters');
}
function goDeleteChapter()
{
    $postManager = new PostManager();
    $varDeleteChapter = $postManager->modelDeleteChapter($_GET['id']);
    header('location:index.php?action=listChapters');
}


function golistComments()
{
    $commentManager = new CommentManager();
    $allComments = $commentManager->modelListComments();
    require('view/ListComments.php');
}
function addcomment()
{
    $commentManager = new CommentManager();
    $insertComment = $commentManager->ajoutComment($_SESSION['idUser'], $_GET['id'], $_POST['message']);
    header('location:index.php?action=showChapter&id=' . $_GET['id']);
}
function goDeleteComment()
{
    $commentManager = new CommentManager();
    $varDeleteComment = $commentManager->modelDeleteComment($_GET['id']);
    header('location:index.php?action=listComments');
}


function goAddAlert()
{
    $alertManager = new AlertManager();
    $varAddAlert = $alertManager->modelAddAlert($_GET['idcomment'], $_SESSION['idUser']);
    header('location: index.php');
}
function golistAlerts()
{
    $alertManager = new AlertManager();
    $allAlerts = $alertManager->modelListAlerts();
    require('view/ListAlerts.php');
}
function goDeleteAlert()
{
    $alertManager = new AlertManager();
    $alert = 0;
    $varDeleteAlert = $alertManager->modelDeleteAlert($_GET['id'], $alert);
    print_r($varDeleteAlert);
    header('location:index.php?action=listAlerts');
}


function errorPage()
{
    require('view/error.php');
}
