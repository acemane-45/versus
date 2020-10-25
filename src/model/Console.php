<?php

namespace App\src\model;

class console
{
 //*************************Attributs*******************/
/**
     * @var int
     */
    private $id;

 
    //**************************Constructeur*****************/
   
    

    //*************************Getters*********************/

    public function getId()
    {
        return $this->id;
    }


     //*************************Setters*********************/

     public function setId($id)
    {
        $this->id = $id;
    }
}