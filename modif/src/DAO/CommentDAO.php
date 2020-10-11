<?php

namespace App\src\DAO;

use App\config\Parameter;
use App\src\model\Comment;

class CommentDAO extends DAO
{
   

    //rÃ©cupÃ¨re les commentaire d'un jeux
    public function getCommentsFromJeux($jeuxId)
    {
        $sql = 'SELECT id, pseudo, content, createdAt, flag FROM comment WHERE jeux_id = ? ORDER BY createdAt DESC';
        $result = $this->createQuery($sql, [$jeuxId]);
        $comments = [];
        foreach ($result as $data) {
            $comments[] = new Comment($data);
        }
      
        return $comments;
    }
  
    //ajout commentaire
    public function addComment(Parameter $post, $jeuxId)
    {
        $sql = 'INSERT INTO comment (pseudo, content, createdAt, jeux_id) VALUES (?, ?, NOW(), ?)';
        $this->createQuery($sql, [$post->get('pseudo'), $post->get('content'), $jeuxId]);
    }

    //signalement commentaire
    public function flagComment($commentId)
    {
        $sql = 'UPDATE comment SET flag = ? WHERE id = ?';
        $this->createQuery($sql, [1, $commentId]);
    }

    //designalisé un commentaire
    public function unflagComment($commentId)
    {
        $sql = 'UPDATE comment SET flag = ? WHERE id = ?';
        $this->createQuery($sql, [0, $commentId]);
    }

     //suprimÃ© un commentaire
    public function deleteComment($commentId)
    {
        $sql = 'DELETE FROM comment WHERE id = ?';
        $this->createQuery($sql, [$commentId]);
    }

      //récupére la liste de tous commentaires
    public function getFlagComments()
    {
        $sql = 'SELECT id, pseudo, content, createdAt, flag FROM comment WHERE flag = ? ORDER BY createdAt DESC';
        $result = $this->createQuery($sql, [1]);
        $comments = [];
        foreach ($result as $data) {
            $comments[] = new Comment($data);
        }
        
        return $comments;
    }
}