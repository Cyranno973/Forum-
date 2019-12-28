<?php

function modelDbConnect()
{
    try {
        $db = new PDO('mysql:host=localhost;dbname=p4;charset=utf8', 'root', '');
        return $db;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

function listadminaccount()
{
    $db = modelDbConnect();
    $power = 3;
    $check = $db->prepare('SELECT power FROM operator WHERE power= ?');
    $check->execute(array($power));
    $count = $check->rowCount();

    if ($count > 0) {

        return true;
    } else {
        return  false;
    }
}

function modelPseudoCheckAdmin($pseudo)
{
    $db = modelDbConnect();
    $check = $db->prepare('SELECT name FROM admin WHERE name= ?');
    $check->execute(array($pseudo));
    $count = $check->rowCount();

    if ($count > 0) {

        return true;
    } else {
        return  false;
    }
}

function  modelHandlingInscriptionAdmin($pseudo, $mdp, $mail)
{
    $db = modelDbConnect();
    $power = 3;
    $req = $db->prepare('INSERT INTO operator( name, pass, mail, power) VALUES(:name, :pass, :mail, :power)');

    $req->execute(array(
        'name' => $pseudo,
        'pass' => password_hash($mdp, PASSWORD_DEFAULT),
        'mail' => $mail,
        'power' => $power,

    ));
    return true;
}
function  modelLogin()
{
    return true;
}
function  modelAddInsciptionAdmin()
{
    return true;
}

function modelPseudoCheckOperator($pseudo)
{
    $db = modelDbConnect();
    $check = $db->prepare('SELECT name FROM operator WHERE name= ?');
    $check->execute(array($pseudo));
    $count = $check->rowCount();

    if ($count > 0) {

        return true;
    } else {
        return  false;
    }
}
function modelinfoUpdateOperator($id)
{
    $db = modelDbConnect();
    $check = $db->prepare('SELECT name FROM operator WHERE id <> ?');
    $check->execute(array($id));
    $count = $check->rowCount();

    if ($count > 0) {
        return $check;
    } else {
        return  false;
    }
}

function modelPassUpdateOperator($id)
{
    $db = modelDbConnect();
    $check = $db->prepare('SELECT pass FROM operator WHERE id = ?');
    $check->execute(array($id));
    $count = $check->rowCount();

    if ($count > 0) {
        return $check;
    } else {
        return  false;
    }
}

function  modelHandlingInscriptionOperator($pseudo, $mdp, $mail, $power)
{
    $db = modelDbConnect();
    $req = $db->prepare('INSERT INTO operator(name, pass, mail, power) VALUES(:name, :pass, :mail, :power)');
    $req->execute(array(
        'name' => $pseudo,
        'pass' => password_hash($mdp, PASSWORD_DEFAULT),
        'mail' => $mail,
        'power' => $power,
    ));
    return true;
}

function  modelIndexView()
{
    return true;
}
function  modelHandlingInscriptionChapter($titreChapitre, $chapterContent)
{

    $db = modelDbConnect();
    $req = $db->prepare('INSERT INTO chapter(title, content) VALUES(:title, :content)');

    $req->execute(array(
        'title' => $titreChapitre,
        'content' => $chapterContent,

    ));
    return true;
}
function  modelHandlingLoginOperator($pseudo)
{

    $db = modelDbConnect();
    $req = $db->prepare('SELECT * FROM operator where name= ?');

    $req->execute(array($pseudo));
    $infoUser = $req->fetch();
    return $infoUser;
}
function  modelDeleteMembre()
{
    return true;
}
function modelGetInfoOperator($id)
{
    $db = modelDbConnect();
    $req = $db->prepare('SELECT * FROM operator WHERE id= ?');
    $req->execute(array($id));
    $count = $req->rowCount();
    $infoOperator = $req->fetch();
    if ($count > 0) {
        return $infoOperator;
    } else {
        return  false;
    }
}
function  modeldeleteChapter()
{
    return true;
}
function  modelListOperator()
{
    $db = modelDbConnect();
    $req = $db->query('SELECT * FROM operator WHERE power <> 3');
    return $req;
}
function  modelListMembre()
{
    $db = modelDbConnect();
    $req = $db->query('SELECT id, title, content FROM membre ORDER BY id DESC LIMIT 0, 5 ');
    return $req;
}
function  modelListChapter()
{
    $db = modelDbConnect();
    $req = $db->query('SELECT id, title, content FROM membre ORDER BY id DESC LIMIT 0, 5 ');
    return $req;
}

function  modelListComment()
{
    $db = modelDbConnect();
    $req = $db->query('SELECT id, title, content FROM membre ORDER BY id DESC LIMIT 0, 5 ');
    return $req;
}
function  modelListAlert()
{
    $db = modelDbConnect();
    $req = $db->query('SELECT id, title, content FROM membre ORDER BY id DESC LIMIT 0, 5 ');
    return $req;
}
function  modelDeleteComment()
{
    return true;
}
function  modelDeleteAlert()
{
    return true;
}
function  modelUpdateOperator()
{
    return true;
}
function  modelHandlingUpdateOperator($id, $pseudo, $password, $email, $power)
{

    $db = modelDbConnect();

    $req = $db->prepare('UPDATE operator SET name= :name, pass= :pass, mail= :mail, power= :power WHERE id= :id');
    $req->execute(array(
        'name' => $pseudo,
        'pass' => $password,
        'mail' => $email,
        'power' => $power,
        'id' => $id
    ));

    return true;
}

function  modelUpdateMembre()
{
    return true;
}
function  modelUpdateChapter()
{
    return true;
}
