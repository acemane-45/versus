<?php

namespace App\src\DAO;

use App\config\Parameter;
use App\src\model\Jeux;


class JeuxDAO extends DAO
{

    //Permet de recupérer la liste des jeux (titre pour parti admin)
    public function getJeux()
    {

        $sql = 'SELECT id, title FROM jeux ORDER BY id DESC ';
        $result = $this->createQuery($sql);
        $jeux = [];
        foreach ($result as $data){
            
            $jeux[] = new Jeux($data);
        }
        $result->closeCursor();
        return $jeux;
    }

    //Permet de recupérer la liste des jeux (titre et année)
    public function getListeJeux()
    {

        $sql = 'SELECT id, title, createdAt FROM jeux ORDER BY id DESC ';
        $result = $this->createQuery($sql);
        $jeux = [];
        foreach ($result as $data){
            
            $jeux[] = new Jeux($data);
        }
        $result->closeCursor();
        return $jeux;
    }

      //Permet d'ajouter un jeux dans la BDD
      public function addJeux(Parameter $post, $userId)
      {
       
          $sql = 'INSERT INTO jeux (console, title, jaquette, infos, extrait, createdAt, user_id) VALUES (?, ?, NOW(), ?)';
          $this->createQuery($sql, [
              $post->get('console'),
               $post->get('title'),
                $post->get('jaquette'),
                 $post->get('infos'),
                  $post->get('extrait'),
                   $post->get('createdAt'), $userId]);
      }
      
  
      //Permet de modifier un article dans la BDD
      public function editJeux(Parameter $post, $jeuxId)
      {
          $sql = 'UPDATE jeux SET console=:console, title=:title, jaquette=:jaquette, infos=:infos, extrait=:extrait, createdAt=:createdAt WHERE id=:jeuxId';
          $this->createQuery($sql, [
              'console' => $post->get('console'),
              'title' => $post->get('title'),
              'jaquette' => $post->get('jaquette'),
              'infos' => $post->get('infos'),
              'extrait' => $post->get('extrait'),
              'createdAt' => $post->get('createdAt'),
              'jeuxId' => $jeuxId
          ]);
      }
  
      //Permet de suprimer un jeux et son commentaire dans la BDD
      public function deleteJeux($jeuxId)
      {
          $sql = 'DELETE FROM comment WHERE jeux_id = ?';//commentaire
          $this->createQuery($sql, [$jeuxId]);
          $sql = 'DELETE FROM jeux WHERE id = ?';//article
          $this->createQuery($sql, [$jeuxId]);
      }
  
 
}