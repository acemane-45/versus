<?php

namespace App\src\constraint;

class Validation
{

    //gestion de la classe ConsoleValidation
    public function validate($data, $name)
    {
        if($name === 'Console') {
            $articleValidation = new ConsoleValidation();
            $errors = $consoleValidation->check($data);
            return $errors;
        }
        //gestion de la classe JeuxValidation 
        elseif ($name === 'Jeux') {
            $commentValidation = new JeuxValidation();
            $errors = $jeuxValidation->check($data);
            return $errors;
        }
        //gestion de la classe MarquesValidation 
        elseif ($name === 'Marque') {
            $commentValidation = new MarquesValidation();
            $errors = $marqueValidation->check($data);
            return $errors;
        }
        //gestion de la classe CommentValidation 
        elseif ($name === 'Comment') {
            $commentValidation = new CommentValidation();
            $errors = $commentValidation->check($data);
            return $errors;
        }
        //gestion de la classe UserValidation
        elseif ($name === 'User') {
            $userValidation = new UserValidation();
            $errors = $userValidation->check($data);
            return $errors;
        }
    }
}