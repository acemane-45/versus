<?php

namespace App\src\DAO;

use App\config\Parameter;
use App\src\model\Marques;


class NoteDAO extends DAO 
{
        //Permet de récupérer la liste de toutes les notes d'un jeux
        public function getNotes()
        {
    
            $sql = 'SELECT * date FROM note INNER JOIN jeux ON jeux_id ORDER BY jeux_id DESC ';
            $result = $this->createQuery($sql);
            $notes = [];
            foreach ($result as $data){
                
                $notes[] = new Note($data);
            }
            $result->closeCursor();
            return $notes;
        }


        //Permet d'ajouter une note dans la BDD
    public function addNote(Parameter $post, $jeuxId)
    {
        $sql = 'INSERT INTO note (score, jeux_id) VALUES (?, ?, NOW(), ?)';
        $this->createQuery($sql, [$post->get('score'),  $jeuxId]);
    }

         //Permet de récupérer la moyenne  d'un jeux
        public function getScore()
        {
          $sql = 'SELECT avg(score) FROM note INNER JOIN jeux ON jeux_id' ;
          $result = $this->createQuery($sql);
          $score[] = new Score($data);
          $result->closeCursor();
          return $score;
        }

         //Permet d ajouter une note a un jeux
}
