<?php

namespace App\src\DAO;

use App\config\Parameter;
use App\src\model\Marques;


class NoteDAO extends DAO 
{
        //Permet de récupérer la liste de toutes les notes d'un jeux
        public function getNote()
        {
    
            $sql = 'SELECT score FROM note WHERE jeux_id ORDER BY id DESC';
            $result = $this->createQuery($sql);
            $note = [];
            foreach ($result as $data){
                
                $note[] = new Note($data);
            }
            $result->closeCursor();
            return $note;
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
          $sql = 'SELECT avg(score) FROM note WHERE jeux_id = ?' ;
          $result = $this->createQuery($sql);
          $score[] = new Score($data);
          $result->closeCursor();
          return $score;
        }

         //Permet d ajouter une note a un jeux
}
