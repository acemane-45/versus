<?php

namespace App\src\model;

class Jeux extends Hydrator

{
//*************************Attributs*******************/
    /**
     * @var int
     */
    private $id;

     /**
     * @var string
     */
    private $console;

    /**
     * @var string
     */
    private $title;

     /**
     * @var string
     */
    private $jaquette;

    /**
     * @var string
     */
    private $infos;  

    /**
     * @var string
     */
    private $extrait;
    
    /**
     * @var \Date
     */
    private $createdAt;


    
   
    //**************************Getters*********************/

    public function getId()
    {
        return $this->id;
    }

    public function getConsole()
    {
        return $this->console;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getJaquette()
    {
        return $this->jaquette;
    }

    public function getInfos()
    {
        return $this->infos;
    }

    public function getExtrait()
    {
        return $this->extrait;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }


   //***************************Setters********************/

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setConsole($console)
    {
        $this->console = $console;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setJaquette($jaquette)
    {
        $this->jaquette = $jaquette;
    }

    public function setInfos($infos)
    {
        $this->infos = $infos;
    }
   
    public function setExtrait($extrait)
    {
        $this->extrait = $extrait;
    }
   
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }
    
}