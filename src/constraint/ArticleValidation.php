<?php

namespace App\src\constraint;
use App\config\Parameter;

class ArticleValidation extends Validation
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
            return $this->constraint->notBlank('contenu', $value);//checkTitle, checkContent et checkAuthor font appels aux différentes contraines créées.
        }
        if($this->constraint->minLength($name, $value, 2)) {
            return $this->constraint->minLength('contenu', $value, 2);
        }
    }

   
}