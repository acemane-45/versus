<?php


require '../vendor/autoload.php';

use Router\Router;
use App\Exceptions\NotFoundException;

define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);//constante qui enmene au dossier views
define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR); //constante qui enmene au dossier des scripts
define('DB_NAME', 'versus');
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PWD', '');

$router = new Router($_GET['url']);

$router->get('/', 'App\Controllers\FrontController@welcome');
$router->get('/marque/:id', 'App\Controllers\FrontController@marque');
$router->get('/console/:id', 'App\Controllers\FrontController@console');
$router->get('/jeux/:id', 'App\Controllers\BlogController@jeux');
$router->get('//:id', 'App\Controllers\BlogController@');


try {
    $router->run();
} catch (NotFoundException $e) {
    return $e->error404();
}
