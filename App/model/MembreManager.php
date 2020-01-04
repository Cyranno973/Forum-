<?php
namespace App\model;

class MembreManager extends Manager
{
	public function modelListMembres()
	{
		$db = $this->dbConnect();
		$req = $db->query('SELECT * FROM users ORDER BY id');
		return $req;
	}

	public function checkPseudo($pseudo)
	{
		$db = $this->dbConnect();
		$check = $db->prepare('SELECT pseudo FROM users WHERE pseudo= ?');
		$check->execute(array($pseudo));
		$count = $check->rowCount();
		if ($count > 0) {
			return true;
		} else {
			return  false;
		}
	}
	public function ajoutMembre($pseudo, $mdp, $mail)
	{

		$db = $this->dbConnect();
		$req = $db->prepare('INSERT INTO users(pseudo, pass, mail) VALUES(:pseudo, :pass, :mail)');

		$req->execute(array(
			'pseudo' => $pseudo,
			'pass' => password_hash($mdp, PASSWORD_DEFAULT),
			'mail' => $mail

		));
		print_r($req);
	}
	public function getPseudo($id_auteur)
	{
		$db = $this->dbConnect();
		$check = $db->prepare('SELECT pseudo FROM membre WHERE id= ?');
		$check->execute(array($id_auteur));
		$count = $check->rowCount();
		if ($count > 0) {
			return $check->fetch();
		} else {
			return  false;
		}
	}
	public function checkMembre($pseudo)
	{
		$db = $this->dbConnect();
		$check = $db->prepare('SELECT id, pseudo, droitUser, pass FROM users WHERE pseudo = ?');
		$check->execute(array($pseudo));
		$infoUser = $check->fetch();
		return $infoUser;
	}
	public function modelDeleteUser($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM users WHERE id = ?');
        $req->execute(array($id));
        return $req;
	}
	




	function modelPseudoCheckOperator($pseudo)
	{
		$db = $this->dbConnect();
		$check = $db->prepare('SELECT pseudo FROM users WHERE pseudo= ?');
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
		$db = $this->dbConnect();
		$check = $db->prepare('SELECT pseudo FROM users WHERE id <> ?');
		$check->execute(array($id));
		$count = $check->rowCount();
	
		if ($count > 0) {
			return $check;
		} else {
			return  false;
		}
	}
	public function modelGetInfoOperator($id)
{
    $db = $this->dbConnect();
    $req = $db->prepare('SELECT * FROM users WHERE id= ?');
    $req->execute(array($id));
    $count = $req->rowCount();
    $infoOperator = $req->fetch();
    if ($count > 0) {
        return $infoOperator;
    } else {
        return  false;
    }
}
	function modelPassUpdateOperator($id)
	{
		$db = $this->dbConnect();
		$check = $db->prepare('SELECT pass FROM users WHERE id = ?');
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
		$db = $this->dbConnect();
		$req = $db->prepare('INSERT INTO users(pseudo, pass, mail, droitUser) VALUES(:pseudo, :pass, :mail, :droitUser)');
		$req->execute(array(
			'pseudo' => $pseudo,
			'pass' => password_hash($mdp, PASSWORD_DEFAULT),
			'mail' => $mail,
			'droitUser' => $power,
		));
		return true;
	}

	function  modelHandlingUpdateOperator($id, $pseudo, $password, $email, $power)
	{
	
		$db = $this->dbConnect();
	
		$req = $db->prepare('UPDATE users SET pseudo= :pseudo, pass= :pass, mail= :mail, droitUser= :droitUser WHERE id= :id');
		$req->execute(array(
			'pseudo' => $pseudo,
			'pass' => $password,
			'mail' => $email,
			'droitUser' => $power,
			'id' => $id
		));
	
		return true;
	}
	



}
