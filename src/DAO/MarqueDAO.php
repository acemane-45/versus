<?php

namespace App\src\DAO;

use App\config\Parameter;
use App\src\model\Marque;


class MarqueDAO extends DAO 
{
        //Permet de récupérer la liste de tout les marques
        public function getMarques()
        {
    
            $sql = 'SELECT id, name FROM marque WHERE id  ';
            $result = $this->createQuery($sql);
            $marques = [];
            foreach ($result as $data){
                
                $marques[] = new Marque($data);
            }
            $result->closeCursor();
            return $marques;
            
        }

             //Permet de recupérer une marque
    public function getMarque( $marqueId)
    {
      
        $sql = 'SELECT * FROM marque WHERE id = ?';      
        $result = $this->createQuery($sql, [$marqueId]);
      
        foreach ($result as $data){
          
            $marque= new Marque($data);
       }
       
        return $marque;
    }


    
    //Permet d'ajouter une marque dans la BDD
    public function addMarque(Parameter $post, $userId)
    {
        $sql = 'INSERT INTO marque (name, logo, pub, infos, date, user_id) VALUES (?, ?, NOW(), ?)';
        $this->createQuery($sql, [$post->get('name'), $post->get('logo'),$post->get('date'),$post->get('infos'),$post->get('pub'), $userId]);
    }
    

    //Permet de modifier une marque dans la BDD
    public function editMarque(Parameter $post, $marqueId)
    {
        $sql = 'UPDATE marque SET name=:name, logo=:logo, date=:date,  infos=:infos, pub=:pub WHERE id=:marqueId';
        $this->createQuery($sql, [
            'name' => $post->get('name'),
            'logo' => $post->get('logo'),
            'date' => $post->get('date'),
            'infos' => $post->get('infos'),
            'pub' => $post->get('pub'),
            'marqueId' => $marqueId
        ]);
    }

    //Permet de suprimer une marque et ses console dans la BDD
    public function deleteMarque($marqueId)
    {
        $sql = 'DELETE FROM marque WHERE id = ?';//marque
        $this->createQuery($sql, [$consoleId]);
        $sql = 'DELETE FROM console WHERE marque_id = ?';//console
        $this->createQuery($sql, [$consoleId]);
    }
}
