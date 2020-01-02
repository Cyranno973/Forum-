<?php
namespace App\model;

class CommentManager extends Manager
{
    public function modelListComments()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT u.pseudo, c.comment, c.id, s.title_sujet FROM  users u, comments c, sujets s Where u.id = c.id_auteur AND s.id_sujet = c.id_sujet ');
        return $req;
    }


    function ajoutcomment($id_auteur, $id_sujet, $comment)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('INSERT INTO comments(id_auteur, id_sujet, comment) VALUES(:id_auteur, :id_sujet, :comment)');

        $req->execute(array(
            'id_auteur' => $id_auteur,
            'id_sujet' => $id_sujet,
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
