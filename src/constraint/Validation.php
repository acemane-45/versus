<?php

namespace App\src\constraint;

class Validation
{

    //gestion de la classe ArticleValidation
    public function validate($data, $name)
    {
        if($name === 'Article') {
            $articleValidation = new ArticleValidation();
            $errors = $articleValidation->check($data);
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