<?php

namespace App\src\model;

class Media extends Hydrator
{
    //*************************Attributs*******************/
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $extrait;

    /**
     * @var string
     */
    private $image; 
    
    /**
     * @var string
     */
    private $jeux_id;
    
    
    


    //**************************Constructeur*****************/
  
     /**
     *Media constructor.
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

    public function getEtrait()
    {
        return $this->extrait;
    }

    public function getImage()
    {
        return $this->image;
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

    public function setExtrait($extrait)
    {
        $this->extrait = $extrait;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function setJeux_id($jeux_id)
    {
        $this->jeux_id = $jeux_id;
    }
   
    
    

    
}