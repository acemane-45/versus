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

     /**
     * @var string
     */
    private $jeux_id;

   



    //**************************Constructeur*****************/
  
     /**
     * Note constructor.
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

    public function getJeux_id()
    {
        return $this->jeux_id;
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

    public function setJeux_id($jeux_id)
    {
        $this->jeux_id = $jeux_id;
    }

    
}