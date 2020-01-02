<?php
namespace App\model;

class AlertManager extends Manager
{
	function modelListAlerts()
	{
		$db = $this->dbConnect();
		$req = $db->query('SELECT idc, id_auteur, id_sujet, alert, comment, pseudo_alert, users.pseudo
    FROM ( SELECT comments.id as idc, comments.id_auteur as id_auteur, comments.id_sujet as id_sujet,
     comments.alert as alert, comments.comment as comment, users.pseudo as pseudo_alert
        FROM comments, users
        WHERE users.id = comments.alert ) 
     AS table_signal, users as users
    where table_signal.id_auteur = users.id
    ');
		return $req;
	}
	function modelAddAlert($id, $alert)
	{
		$db = $this->dbConnect();
		// echo $alert;
		// echo $id;

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
