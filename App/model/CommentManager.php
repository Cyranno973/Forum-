<?php
require_once("app/model/Manager.php");

class CommentManager extends Manager
{
    public function modelListComments()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT m.pseudo, c.comment, c.id, ch.title FROM  membre m, comments c, chapter ch  Where m.id = c.id_auteur AND ch.id = c.id_chapitre ');
        return $req;
    }
    function ajoutcomment($id_auteur, $id_chapitre, $comment)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('INSERT INTO comments(id_auteur, id_chapitre, comment) VALUES(:id_auteur, :id_chapitre, :comment)');

        $req->execute(array(
            'id_auteur' => $id_auteur,
            'id_chapitre' => $id_chapitre,
            'comment' => $comment
        ));
    }
    function modelDeleteComment($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM comments WHERE id = ?');
        $req->execute(array($id));
        return $req;
    }
}
