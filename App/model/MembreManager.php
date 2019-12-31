<?php
namespace App\model;

class MembreManager extends Manager
{
	public function modelListMembres()
	{
		$db = $this->dbConnect();
		$req = $db->query('SELECT * FROM membre ORDER BY id');
		return $req;
	}

	function checkPseudo($pseudo)
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
	function ajoutMembre($pseudo, $mdp, $mail)
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
	function getPseudo($id_auteur)
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
	function checkMembre($pseudo)
	{
		$db = $this->dbConnect();
		$check = $db->prepare('SELECT id, pseudo, droitUser, pass FROM users WHERE pseudo = ?');
		$check->execute(array($pseudo));
		$infoUser = $check->fetch();
		return $infoUser;
	}
}
