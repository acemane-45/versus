<?php

require 'vendor/autoload.php';



//routing
$page = 'accueil';

if(isset($_GET['p'])){

    $page = $_GET['p'];
}

//rendu du template
$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/templates');

$twig = new \Twig\Environment($loader, [

    'cache' => false,// __DIR__ . '/tmp'
]);

switch ($page) {

    case 'accueil':
       echo $twig->render('accueil.twig');
       break;  
       
    case 'sega':
       echo $twig->render('sega.twig');
       break;
       
    case 'nintendo':
       echo $twig->render('nintendo.twig');
       break;  
       
    case 'console':
       echo $twig->render('console.twig');
       break;
       
    case 'jeux':
       echo $twig->render('jeux.twig');
       break; 

    case 'commentaire':
       echo $twig->render('commentaire.twig');
       break;  
       
    case 'inscription':
       echo $twig->render('inscription.twig');
       break;  

    case 'conexion':
        echo $twig->render('conexion.twig');
        break; 
        
    case 'user':
        echo $twig->render('user.twig');
         break;      

    case 'admin':
        echo $twig->render('admin.twig');
        break; 
        
    case 'new_jeux':
         echo $twig->render('new_jeux.twig');
         break;  

     case 'new_console':
         echo $twig->render('new_console.twig');
         break;  
     
      default:
         header('HTTP/1.0 404 Not Found ');
         echo $twig->render('404.twig');
      break;

}