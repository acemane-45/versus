<?php

namespace App\Controllers;

use App\Models\Marque;
use App\Models\Console;
use App\Models\Jeux;
use App\Models\Comment;

class FrontController extends Controller {

    public function welcome()
    {
        return $this->view('blog.home');
    }

  
}
