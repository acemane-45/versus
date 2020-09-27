<?php

namespace App\src\model;

class Comment extends Hydrator
{
    //*************************Attributs*******************/

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $pseudo;

    /**
     * @var string
     */
    private $content;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var bool
     */
    private $flag;
    //*************************Constructeur****************/

    /**
     * Comment constructor.
     *
     * @param $data
     */
    public function __construct($data)
    {
        $this->hydrate($data);
    }

    //*************************Getters*********************/

    public function getId()
    {
        return $this->id;
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getDate()
    {
        return $this->date;
    }
    
    public function isFlag()
    {
        return $this->flag;
    }
    


    //*************************Setters*********************/
  
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }
    public function setFlag($flag)
    {
        $this->flag = $flag;
  
}