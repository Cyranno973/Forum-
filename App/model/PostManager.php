<?php

namespace App\model;

class PostManager extends Manager
{
	public function modelListRubric()
	{
		$db = $this->dbConnect();
		$req = $db->query('SELECT * FROM rubrics ORDER BY id_rubric DESC');
		return $req;
	}
	public function modelListSujet()
	{
		$db = $this->dbConnect();
		$req = $db->query('SELECT * FROM sujets');
		return $req;
	}
	public function modelCreateRubric($pathImg, $title)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('INSERT INTO rubrics(image, title_rubric) VALUES(:image, :title_rubric)');
		$req->execute(array(
			'image' => $pathImg,
			'title_rubric' => $title,
		));
		return true;
	}
	public function modelCreateSujet($title, $iduser, $content, $idrubric)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('INSERT INTO sujets(title_sujet, id_user, content, id_rubrique) VALUES(:title_sujet, :id_user, :content, :id_rubrique)');
		$req->execute(array(
			'title_sujet' => $title,
			'id_user' => $iduser,
			'content' => $content,
			'id_rubrique' => $idrubric
		));
		return true;
	}
	public function modelCheckRubric($id)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT * FROM rubrics WHERE id_rubric= ?');
		$req->execute(array($id));
		$count = $req->rowCount();
		if ($count > 0) {
			$check = $req->fetch();
			return $check;
		} else {
			return  false;
		}
	}
	public function modelCheckSujet($id)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT * FROM Sujets WHERE id_sujet= ?');
		$req->execute(array($id));
		$count = $req->rowCount();
		if ($count > 0) {
			$check = $req->fetch();
			return $check;
		} else {
			return  false;
		}
	}
	function  modelUpdateRubric($id,  $title, $path)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE rubrics SET image= :image, title_rubric= :title_rubric  WHERE id_rubric= :id_rubric');
		$req->execute(array(
			'title_rubric' => $title,
			'image' => $path,
			'id_rubric' => $id
		));
		return true;
	}
	function  modelHandlingUpdateSujet($id_sujet, $title_sujet, $id_user, $content, $id_rubrique)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE sujets SET title_sujet= :title_sujet, id_user= :id_user, content= :content, id_rubrique= :id_rubrique  WHERE id_sujet= :id_sujet');
		$req->execute(array(
			'id_sujet' => $id_sujet,
			'title_sujet' => $title_sujet,
			'id_user' => $id_user,
			'content' => $content,
			'id_rubrique' => $id_rubrique
		));
		return true;
	}
	function modelDeleteRubric($id)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('DELETE FROM rubrics WHERE id_rubric = ?');
		$req->execute(array($id));
		return $req;
	}
	function modelDeleteSujet($id)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('DELETE FROM sujets WHERE id_sujet = ?');
		$req->execute(array($id));
		return $req;
	}
	public function modelRubricUser($id)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id_rubric, title_rubric, id_sujet FROM rubrics r, sujets s WHERE r.id_rubric = s.id_rubrique AND  id_sujet= ?');
		$req->execute(array($id));
		$reqGetChapter = $req->fetch();
		return $reqGetChapter;
	}
	public function modelGetComments($id, $depart, $nbrCommentsByPages)
	{
		$db = $this->dbConnect();
		$comments = $db->prepare('SELECT c.id, comment, pseudo FROM comments c, users u  Where u.id = c.id_auteur AND id_sujet= ? ORDER BY id DESC LIMIT ' . $depart . ',' . $nbrCommentsByPages);
		$comments->execute(array($id));
		return $comments;
	}
	public function modelAllcomments($id, $firstCommentPage, $nbrCommentsByPages)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT * FROM comments WHERE id_sujet=:id ORDER BY id ASC LIMIT $firstCommentPage, $nbrCommentsByPages');
		$req->execute(array(
			'id' => $id
		));
		return $req;
	}
	public function modelFilterSujet($id)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT * FROM sujets WHERE id_rubrique= ?');
		$req->execute(array($id));
		return $req;
	}
	public function modelNbrCommentsTotales($id)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT *  FROM comments WHERE id_sujet= ?');
		$req->execute(array($id));
		$count = $req->rowCount();
		return $count;
	}
	public function modelSelectSujet($id)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT * FROM sujets WHERE id_sujet= ?');
		$req->execute(array($id));
		$req = $req->fetch();
		return $req;
	}
}
