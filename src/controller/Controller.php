<?php

namespace App\src\controller;

use App\config\Request;
use App\src\constraint\Validation;
use App\src\DAO\ConsoleDAO;
use App\src\DAO\MarqueDAO;
use App\src\DAO\JeuxDAO;
use App\src\DAO\NoteDAO;
use App\src\DAO\CommentDAO;
use App\src\DAO\UserDAO;
use App\src\view\View;

abstract class Controller
{
    protected $consoleDAO;
    protected $marqueDAO;
    protected $jeuxDAO;
    protected $noteDAO;
    protected $commentDAO;
    protected $userDAO;
    protected $view;
    private $request;
    protected $get;
    protected $post;
    protected $session;
    protected $validation;

    public function __construct()
    {
        $this->consoleDAO = new ConsoleDAO();
        $this->marqueDAO = new MarqueDAO();
        $this->jeuxDAO = new JeuxDAO();
        $this->noteDAO = new NoteDAO();
        $this->commentDAO = new CommentDAO();
        $this->userDAO = new UserDAO();
        $this->view = new View();
        $this->validation = new Validation();
        $this->request = new Request();
        $this->get = $this->request->getGet();
        $this->post = $this->request->getPost();
        $this->session = $this->request->getSession();
    }
}