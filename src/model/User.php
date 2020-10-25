<?php

namespace App\src\model;

class User  
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
    private $password;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var string
     */
    private $role;

    

    //**************************Constructeur*****************/
   

    //*************************Getters*********************/

    public function getId()
    {
        return $this->id;
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getRole()
    {
        return $this->role;
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

    public function setPassword($password)
    {
        $this->pass = $password;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }
    
}