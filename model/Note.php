<?php

namespace App\src\model;

class Note extends Hydrator
{
    //*************************Attributs*******************/
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $score;

   


    //**************************Constructeur*****************/
  
     /**
     * Article constructor.
     *
     * @param $data
     */
    public function __construct($data)
    {
        $this->hydrate($data);
    }
 
   
    //**************************Getters*********************/

    public function getId()
    {
        return $this->id;
    }

    public function getScore()
    {
        return $this->score;
    }

   


   //***************************Setters********************/

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setScore($score)
    {
        $this->score = $score;
    }

    

    
}