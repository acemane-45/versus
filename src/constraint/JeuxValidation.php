<?php

namespace App\src\constraint;
use App\config\Parameter;

class JeuxValidation extends Validation
{
    private $errors = [];
    private $constraint;

    //Créer un nouvel objet basé sur la classe Contraint
    public function __construct()
    {
        $this->constraint = new Constraint();
    }

    //Récupére toutes les données de la classe Parameter (via la méthode all ), et fait appel à la méthode checkField
    public function check(Parameter $post)
    {
        foreach ($post->all() as $key => $value) {
            $this->checkField($key, $value);
        }
        return $this->errors;
    }

    // Vérifie chaque champ 
    private function checkField($name, $value)
    {
        if($name === 'console') {
            $error = $this->checkConsole($name, $value);
            $this->addError($name, $error);
        }
        elseif ($name === 'title') {
            $error = $this->checkTitle($name, $value);
            $this->addError($name, $error);
        }
        elseif ($name === 'jaquette') {
            $error = $this->checkJaquette($name, $value);
            $this->addError($name, $error);
        }
        elseif ($name === 'infos') {
            $error = $this->checkInfos($name, $value);
            $this->addError($name, $error);
        }
        elseif ($name === 'extrait') {
            $error = $this->checkExtrait($name, $value);
            $this->addError($name, $error);
        }
        elseif ($name === 'createdAt') {
            $error = $this->checkCreatedAt($name, $value);
            $this->addError($name, $error);
        }
             
    }

    //Ajoute une erreur si un des champs n'est pas valide
    private function addError($name, $error) {
        if($error) {
            $this->errors += [
                $name => $error
            ];
        }
    }

    private function checkConsole($name, $value)
    {
        if($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('console', $value);
        }
        if($this->constraint->minLength($name, $value, 2)) {
            return $this->constraint->minLength('console', $value, 2);
        }
        if($this->constraint->maxLength($name, $value, 255)) {
            return $this->constraint->maxLength('console', $value, 255);
        }
    }

    private function checkTitle($name, $value)
    {
        if($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('titre', $value);
        }
        if($this->constraint->minLength($name, $value, 2)) {
            return $this->constraint->minLength('titre', $value, 2);
        }
        if($this->constraint->maxLength($name, $value, 255)) {
            return $this->constraint->maxLength('titre', $value, 255);
        }
    }

    private function checkJaquette($name, $value)
    {
        if($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('jaquette', $value);
        }
        if($this->constraint->minLength($name, $value, 2)) {
            return $this->constraint->minLength('jaquette', $value, 2);
        }
        if($this->constraint->maxLength($name, $value, 255)) {
            return $this->constraint->maxLength('jaquette', $value, 255);
        }
    }

    private function checkInfos($name, $value)
    {
        if($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('infos', $value);
        }
        if($this->constraint->minLength($name, $value, 2)) {
            return $this->constraint->minLength('infos', $value, 2);
        }
        if($this->constraint->maxLength($name, $value, 255)) {
            return $this->constraint->maxLength('infos', $value, 255);
        }
    }

    private function checkExtrait($name, $value)
    {
        if($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('extrait', $value);
        }
        if($this->constraint->minLength($name, $value, 2)) {
            return $this->constraint->minLength('extrait', $value, 2);
        }
        if($this->constraint->maxLength($name, $value, 255)) {
            return $this->constraint->maxLength('extrait', $value, 255);
        }
    }

    private function checkCreatedAt($name, $value)
    {
        if($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('createdAt', $value);//checkTitle, checkContent et checkAuthor font appels aux différentes contraines créées.
        }
        if($this->constraint->minLength($name, $value, 2)) {
            return $this->constraint->minLength('createdAt', $value, 2);
        }
    }

   
}