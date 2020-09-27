<?php

namespace App\src\model;

class Console extends Hydrator
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
    private $content;  
    /**
     * @var string
     */
    private $media;
    
    /**
     * @var \DateTime
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

    public function getContent()
    {
        return $this->content;
    }

    public function getMedia()
    {
        return $this->media;
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

    public function setContent($content)
    {
        $this->content = $content;
    }
   
    public function setMedia($media)
    {
        $this->media = $media;
    }
   
    public function setDate($date)
    {
        $this->date = $date;
    }

    
}