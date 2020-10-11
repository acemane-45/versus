<?php

namespace App\src\DAO;

use App\config\Parameter;
use App\src\model\Console;

class ConsoleDAO extends DAO
{
     //Permet de récupérer la liste de tout les consoles d'une marque
     public function getConsoles($marque_id)
     {
         $sql = 'SELECT title, media FROM console WHERE marque_id = ?';
         $result = $this->creatQuery($sql,[$marque_id]);
         $consoles = [];
         foreach($result as $data){
             $consoles[] = new Console($data);
         }
         return $consoles;
     }
  

       //Permet de recupérer une console
    public function getConsole( $marqueId)
    {
      
        $sql = 'SELECT * FROM console WHERE id = ?';      
        $result = $this->createQuery($sql);
      
        foreach ($result as $data){
          
            $console = new Console($data);
       }
      
        return $console;
    }


    
    //Permet d'ajouter une console dans la BDD
    public function addConsole(Parameter $post, $userId)
    {
        $sql = 'INSERT INTO console (title, content, date, media, marque_id, user_id) VALUES (?, ?, NOW(), ?)';
        $this->createQuery($sql, [$post->get('title'), $post->get('content'),$post->get('date'),$post->get('media'),$post->get('marques_id'), $userId]);
    }
    

    //Permet de modifier une console dans la BDD
    public function editConsole(Parameter $post, $consoleId)
    {
        $sql = 'UPDATE console SET title=:title, content=:content, date=:date, media=:media, marque_id=:marque_id WHERE id=:consoleId';
        $this->createQuery($sql, [
            'title' => $post->get('title'),
            'content' => $post->get('content'),
            'date' => $post->get('date'),
            'media' => $post->get('media'),
            'marque_id' => $post->get('marque_id'),
           
            'consoleId' => $consoleId
        ]);
    }

    //Permet de suprimer une console et ses jeux dans la BDD
    public function deleteConsole($consoleId)
    {
        $sql = 'DELETE FROM jeux WHERE console_id = ?';//jeux
        $this->createQuery($sql, [$consoleId]);
        $sql = 'DELETE FROM console WHERE id = ?';//console
        $this->createQuery($sql, [$consoleId]);
    }
}