<?php
namespace App\model;


class PostManager extends Manager
{

	
	public function modelListRubric()
	{	
		$db = $this->dbConnect();
		$req = $db->query('SELECT * FROM rubrics ');
		
		// print_r($req->fetch());
		return $req;
	}
	public function modelCreateRubric($pathImg,$title)
	{	
		$db = $this->dbConnect();
		$req = $db->prepare('INSERT INTO rubrics(image, title_rubric) VALUES(:image, :title_rubric)');
		$req->execute(array(
			'image' => $pathImg,
			'title_rubric' => $title,
		));
		return true;
	}
	
	
	
	public function getChapters()
	{
		$db = $this->dbConnect();
		$req = $db->query('SELECT id, title, content FROM chapter ORDER BY id DESC LIMIT 0, 5 ');
		return $req;
	}

	public function getChapter($chapterId)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id, title, content FROM chapter WHERE id= ?');
		$req->execute(array($chapterId));
		//reqGetChapter recoit le tableau sql de la fonction fetch
		$reqGetChapter = $req->fetch();
		// sa renvoie la valeur de $reqGetChapter qui est un tableau sql
		return $reqGetChapter;
	}
	public function getcomments($chapterId)
	{
		$db = $this->dbConnect();
		$comments = $db->prepare('SELECT c.id, pseudo, comment  FROM comments c, membre m  Where m.id = c.id_auteur AND id_chapitre= ?');
		$comments->execute(array($chapterId));
		return $comments;
	}
	public function modelListChapters()
	{
		$db = $this->dbConnect();
		$req = $db->query('SELECT * FROM chapter ORDER BY id');
		return $req;
	}
	public function  modelHandlingInscriptionChapter($titreChapitre, $chapterContent)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('INSERT INTO chapter(title, content) VALUES(:title, :content)');
		$req->execute(array(
			'title' => $titreChapitre,
			'content' => $chapterContent,
		));
		return true;
	}
	function modelinfoUpdateChapter($id)
	{
		$db = $this->dbConnect();
		$check = $db->prepare('SELECT * FROM chapter WHERE id= ?');
		$check->execute(array($id));
		$count = $check->rowCount();
		if ($count > 0) {
			$reqinfoChapter = $check->fetch();
			return $reqinfoChapter;
		} else {
			return  false;
		}
	}
	function  modelUpdateChapter($id, $title,  $content)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE chapter SET title= :title, content= :content  WHERE id= :id');
		$req->execute(array(
			'title' => $title,
			'content' => $content,
			'id' => $id
		));
		return true;
	}
	function modelDeleteChapter($id)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('DELETE FROM chapter WHERE id = ?');
		$req->execute(array($id));
		return $req;
	}
}
