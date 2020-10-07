<?php

namespace App\src\constraint;
use App\config\Parameter;

class MarquesValidation extends Validation
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
        if($name === 'title') {
            $error = $this->checkTitle($name, $value);
            $this->addError($name, $error);
        }
        elseif ($name === 'content') {
            $error = $this->checkContent($name, $value);
            $this->addError($name, $error);
        }
        elseif ($name === 'date') {
            $error = $this->checkDate($name, $value);
            $this->addError($name, $error);
        }
        elseif ($name === 'logo') {
            $error = $this->checkogo($name, $value);
            $this->addError($name, $error);
        }
        elseif ($name === 'pub') {
            $error = $this->checkPub($name, $value);
            $this->addError($name, $error);
        }
        elseif ($name === 'infos') {
            $error = $this->checkInfos($name, $value);
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

    private function checkContent($name, $value)
    {
        if($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('contenu', $value);// font appels aux différentes contraines créées.
        }
        if($this->constraint->minLength($name, $value, 2)) {
            return $this->constraint->minLength('contenu', $value, 2);
        }
    }

    private function checkDate($name, $value)
    {
        if($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('date', $value);//font appels aux différentes contraines créées.
        }
        if($this->constraint->minLength($name, $value, 2)) {
            return $this->constraint->minLength('date', $value, 2);
        }
    }
    private function checkLogo($name, $value)
    {
        if($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('logo', $value);//font appels aux différentes contraines créées.
        }
        if($this->constraint->minLength($name, $value, 2)) {
            return $this->constraint->minLength('logo', $value, 2);
        }
    }

    private function checkPub($name, $value)
    {
        if($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('pub', $value);//font appels aux différentes contraines créées.
        }
        if($this->constraint->minLength($name, $value, 2)) {
            return $this->constraint->minLength('pub ', $value, 2);
        }
    }
   
    private function checkInfos($name, $value)
    {
        if($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('infos', $value);//font appels aux différentes contraines créées.
        }
        if($this->constraint->minLength($name, $value, 2)) {
            return $this->constraint->minLength('infos ', $value, 2);
        }
    }
}