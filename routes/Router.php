<?php

namespace Router;

use App\Exceptions\NotFoundException;

class Router {

    public $url;
    public $routes = [];

    public function __construct($url)
    {
        $this->url = trim($url, '/');// suprime les /
    }

    public function get(string $path, string $action)//$path = chemin  $action = l'action
    {
        $this->routes['GET'][] = new Route($path, $action);// acces au tableau des routes en GET
    }

    public function post(string $path, string $action)
    {
        $this->routes['POST'][] = new Route($path, $action);// acces au tableau des routes en POST
    }

    public function run()// boucle sur les routes
    {
        foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {// appel les routes en GET ou POST
            if ($route->matches($this->url)) { //si la route existe
                return $route->execute();// on lance la fonction associer
            }
        }

        throw new NotFoundException("La page demandée est introuvable.");
    }
}
