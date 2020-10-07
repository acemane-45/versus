<?php

namespace App\config;
use App\src\controller\BackController;
use App\src\controller\ErrorController;
use App\src\controller\FrontController;
use Exception;

class Router
{
    private $frontController;
    private $errorController;
    private $backController;
    private $request;

    public function __construct()
    {
        
        $this->frontController = new FrontController();
        $this->backController = new BackController();
        $this->errorController = new ErrorController();
        $this->request = new Request();
    }

    public function run()
    {
        $route = $this->request->getGet()->get('route');
        try{
            if(isset($route))
            {
                if($route === 'console'){
                    $this->frontController->console($this->request->getGet()->get('consoleId'));
                }
                elseif ($route === 'listeconsole'){
                    $this->frontController->listeconsole($this->request->getGet()->get('marqueId')); 
                } 
                elseif ($route === 'marques'){
                    $this->frontController->marques($this->request->getGet()->get('marqueId')); 
                } 
                elseif ($route === 'listejeux'){
                    $this->frontController->listejeux($this->request->getGet()->get('consoleId')); 
                } 
                elseif ($route === 'addConsole'){
                    $this->backController->addConsole($this->request->getPost());
                }
                elseif ($route === 'addJeux'){
                    $this->backController->addJeux($this->request->getPost());
                }
                elseif ($route === 'addMarque'){
                    $this->backController->addMarques($this->request->getPost());
                }
                elseif ($route === 'editConsole'){
                    $this->backController->editConsole($this->request->getPost(), $this->request->getGet()->get('consoleId'));
                }
                elseif ($route === 'editJeux'){
                    $this->backController->editJeux($this->request->getPost(), $this->request->getGet()->get('jeuxId'));
                }
                elseif ($route === 'editMarque'){
                    $this->backController->editMarques($this->request->getPost(), $this->request->getGet()->get('marqueId'));
                }
                elseif($route === 'deleteConsole'){
                    $this->backController->deleteConsole($this->request->getGet()->get('consoleId'));
                }
                elseif($route === 'deleteJeux'){
                    $this->backController->deleteJeux($this->request->getGet()->get('jeuxId'));
                }
                elseif($route === 'deleteMarque'){
                    $this->backController->deleteMarques($this->request->getGet()->get('marqueId'));
                }
                elseif($route === 'addComment'){
                    $this->frontController->addComment($this->request->getPost(), $this->request->getGet()->get('jeuxId'));
                }
                elseif($route === 'addNote'){
                    $this->frontController->addNote($this->request->getPost(), $this->request->getGet()->get('jeuxId'));
                }
                elseif($route === 'flagComment'){
                    $this->frontController->flagComment($this->request->getGet()->get('commentId'));
                }
                elseif($route === 'unflagComment'){
                    $this->backController->unflagComment($this->request->getGet()->get('commentId'));
                }
                elseif($route === 'deleteComment'){
                    $this->backController->deleteComment($this->request->getGet()->get('commentId'));
                }
                elseif($route === 'register'){
                    $this->frontController->register($this->request->getPost());
                }
                elseif($route === 'login'){
                    $this->frontController->login($this->request->getPost());
                }
                elseif($route === 'profile'){
                    $this->backController->profile();
                }
                elseif($route === 'updatePassword'){
                    $this->backController->updatePassword($this->request->getPost());
                }
                elseif($route === 'logout'){
                    $this->backController->logout();
                }
                elseif($route === 'deleteAccount'){
                    $this->backController->deleteAccount();
                }
                elseif($route === 'deleteUser'){
                    $this->backController->deleteUser($this->request->getGet()->get('userId'));
                }
                elseif($route === 'administration'){
                    $this->backController->administration();
                }
                else{
                    $this->errorController->errorNotFound();
                }
            }
            else{
                $this->frontController->home();
            }
        }
        catch (Exception $e)
        {
            $this->errorController->errorServer();
        }
    }
}