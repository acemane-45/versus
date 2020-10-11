<?php

namespace App\src\constraint;
use App\config\Parameter;

class ConsoleValidation extends Validation
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
        elseif ($name === 'media') {
            $error = $this->checkMedia($name, $value);
            $this->addError($name, $error);
        }
        elseif ($name === 'marque_id') {
            $error = $this->checkMarque_id($name, $value);
            $this->addError($name, $error);
        }
        elseif ($name === 'date') {
            $error = $this->checkDate($name, $value);
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


    //checkTitle, checkContent etc... font appels aux différentes contraines créées.

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
            return $this->constraint->notBlank('contenu', $value);
        }
        if($this->constraint->minLength($name, $value, 2)) {
            return $this->constraint->minLength('contenu', $value, 2);
        }
    }

    private function checkMedia($name, $value)
    {
        if($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('media', $value);
        }
        if($this->constraint->minLength($name, $value, 2)) {
            return $this->constraint->minLength('media', $value, 2);
        }
    }

    private function checkMarque_id($name, $value)
    {
        if($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('marque_id', $value);
        }
        if($this->constraint->minLength($name, $value, 2)) {
            return $this->constraint->minLength('marque_id', $value, 2);
        }
    }

    private function checkDate($name, $value)
    {
        if($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('date', $value);
        }
        if($this->constraint->minLength($name, $value, 2)) {
            return $this->constraint->minLength('date', $value, 2);
        }
    }

   
}