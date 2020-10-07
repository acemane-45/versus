<?php

namespace App\src\DAO;

use App\config\Parameter;
use App\src\model\Jeux;

class JeuxDAO extends DAO
{
     //Permet de récupérer la liste de tout les juex
     public function getListe()
     {
 
         $sql = 'SELECT * FROM jeux INNER JOIN console ON console_id ORDER BY id ';
         $result = $this->createQuery($sql);
         $liste = [];
         foreach ($result as $data){
             
             $liste[] = new Jeux($data);
         }
         $result->closeCursor();
         return $liste;
     }


       //Permet de recupérer un jeux
    public function getJeux( $jeuxId)
    {
      
        $sql = 'SELECT * FROM jeux INNER JOINT media ON jeux_id WHERE id = ?';      
        $result = $this->createQuery($sql, [$jeuxId]);
      
        foreach ($result as $data){
          
            $jeux = new Jeux($data);
       }
       
        return $jeux;
    }


    
    //Permet d'ajouter un jeux dans la BDD
    public function addjeux(Parameter $post, $userId)
    {
        $sql = 'INSERT INTO jeux (title, content, date, console_id, user_id) VALUES (?, ?, NOW(), ?)';
        $this->createQuery($sql, [$post->get('title'), $post->get('content'),$post->get('date'),$post->get('console_id'), $userId]);
    }
    //Permet d'ajouter les media d'un jeux dans la BDD
    public function addMedia(Parameter $post, $userId)
    {
        $sql = 'INSERT INTO media (extrait, image, jeux_id, user_id) VALUES (?, ?, NOW(), ?)';
        $this->createQuery($sql, [$post->get('extrait'), $post->get('image'),$post->get('jeux_id'), $userId]);
    }

    //Permet de modifier un jeux dans la BDD
    public function editjeux(Parameter $post, $jeuxId)
    {
        $sql = 'UPDATE jeux SET title=:title, content=:content, date=:date, console_id=:console_id WHERE id=:jeuxId';
        $this->createQuery($sql, [
            'title' => $post->get('title'),
            'content' => $post->get('content'),
            'date' => $post->get('date'),
            'console_id' => $post->get('console_id'),
           
            'jeuxId' => $jeuxId
        ]);
    }
       //Permet de modifier un media dans la BDD
       public function editmedia(Parameter $post, $jeuxId)
       {
           $sql = 'UPDATE media SET extrait=:extrait, image=:image, jeux_id=:jeux_id WHERE id=:mediaId';
           $this->createQuery($sql, [
               'extrait' => $post->get('extrait'),
               'image' => $post->get('image'),
               'jeux_id' => $post->get('jeux_id'),
              
               'mediaId' => $mediaId
           ]);
       }

    //Permet de suprimer un jeux ,ses media, ses commentaire et ses notes dans la BDD
    public function deleteJeux($jeuxId)
    {
        $sql = 'DELETE FROM jeux WHERE id = ?';//jeux
        $this->createQuery($sql, [$jeuxId]);
        $sql = 'DELETE FROM media WHERE jeux_id = ?';//media
        $this->createQuery($sql, [$jeuxId]);
        $sql = 'DELETE FROM comment WHERE jeux_id = ?';//cmmentaire
        $this->createQuery($sql, [$jeuxId]);
        $sql = 'DELETE FROM note WHERE jeux_id = ?';//note
        $this->createQuery($sql, [$jeuxId]);
    }
}