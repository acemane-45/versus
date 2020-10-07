<?php

namespace App\src\model;

class Marque extends Hydrator
{
    //*************************Attributs*******************/
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $logo;

    /**
     * @var string
     */
    private $pub;  
    
     /**
     * @var string
     */
    private $infos;  

    /**
     * @var \Date
     */
    private $date;


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

    public function getTitle()
    {
        return $this->title;
    }

    public function getLogo()
    {
        return $this->logo;
    }

    public function getPub()
    {
        return $this->pub;
    }
    public function getInfos()
    {
        return $this->infos;
    }

   
    public function getDate()
    {
        return $this->date;
    }


   //***************************Setters********************/

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setLogo($logo)
    {
        $this->logo = $log;
    }

    public function setPub($pub)
    {
        $this->pub = $pub;
    }
    public function setInfos($infos)
    {
        $this->infos = $infos;
    }
   
    public function setDate($date)
    {
        $this->date = $date;
    }

    
}