<?php
require_once("app/model/Manager.php");

class AlertManager extends Manager
{
	function modelListAlerts()
	{
		$db = $this->dbConnect();
		$req = $db->query('SELECT idc, id_auteur, id_chapitre, alert, comment, pseudo_alert, membre.pseudo
    FROM ( SELECT comments.id as idc, comments.id_auteur as id_auteur, comments.id_chapitre as id_chapitre,
     comments.alert as alert, comments.comment as comment, membre.pseudo as pseudo_alert
        FROM comments, membre
        WHERE membre.id = comments.alert ) 
     AS table_signal, membre as membre
    where table_signal.id_auteur = membre.id
    ');
		return $req;
	}
	function modelAddAlert($id, $alert)
	{
		$db = $this->dbConnect();
		echo $alert;
		echo $id;

		$req = $db->prepare('UPDATE comments SET alert=:alert WHERE id= :id');
		$req->execute(array(
			'alert' => $alert,
			'id' => $id
		));
		return $req;
	}
	function modelDeleteAlert($id, $alert)
	{
		$db = $db = $this->dbConnect();
		$req = $db->prepare('UPDATE comments SET alert= :alert WHERE id = :id');
		$req->execute(array(
			'alert' => $alert,
			'id' => $id
		));
		return $req;
	}
}
