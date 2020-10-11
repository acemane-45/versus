<?php

namespace App\Controllers;

use App\Models\Marque;
use App\Models\Console;

class BlogController extends Controller {

    public function welcome()
    {
        return $this->view('blog.home');
    }

  
}
