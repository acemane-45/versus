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
    private $createdAt;

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

    public function getCreatedAt()
    {
        return $this->createdAt;
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
        $this->password = $password;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }
    
}