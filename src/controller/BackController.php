<?php

namespace App\src\controller;

use App\config\Parameter;

class BackController extends Controller
{
    //permet de vérifier que l'user est bien connecté sinon retour a la page connexion
    private function checkLoggedIn()
    {
        if(!$this->session->get('pseudo')) {
            $this->session->set('need_login', 'Vous devez vous connecter pour accéder à cette page');
            header('Location: ../public/index.php?route=login');
        } else {
            return true;
        }
    }

    //fait appel à checkLoggedIn, et vérifie que la personne connecté à le rôle admin sinon retour page profil
    private function checkAdmin()
    {
        $this->checkLoggedIn();
        if(!($this->session->get('role') === 'admin')) {
            $this->session->set('not_admin', 'Vous n\'avez pas le droit d\'accéder à cette page');
            header('Location: ../public/index.php?route=profile');
        } else {
            return true;
        }
    }

     //fonction admin
    public function administration()
    {
        if($this->checkAdmin()) 
        {
          $consoles = $this->ConsoleDAO->getConsoles();
          $jeux = $this->jeuxDAO->getJeux();
          $marques = $this->MarquesDAO->getMarques();
          $comments = $this->CommentDAO->getFlagComments();
          $users = $this->userDAO->getUsers();
          return $this->view->render('administration', [
            'consoles' => $consoles,
            'marques' => $marques,
            'jeux' => $jeux,
            'comments' => $comments,
            'users' => $users
           ]);
        }
    }
    
 
/******************  METHODES   CONSOLE    ************************************** */


     //Méthode pour ajoutée une console
     public function addConsole(Parameter $post)
     {
         if($this->checkAdmin()) 
         {
           if($post->get('submit'))
            {
               $errors = $this->validation->validate($post, 'Console');
               if(!$errors)
                {
                 $this->consoleDAO->addConsole($post, $this->session->get('id'));
                 $this->session->set('add_console', 'La nouvelle console a bien été ajouté');
                 header('Location: ../public/index.php?route=administration');
                }
               return $this->view->render('add_console', [
                 'post' => $post,
                 'errors' => $errors
               ]);
             }
           return $this->view->render('add_console');
         }
     } 

    //Méthode pour modifier une console
    public function editConsole(Parameter $post, $consoleId)
    {
        if($this->checkAdmin()) 
        {
           $console = $this->consoleDAO->getConsole($consoleId);
           if($post->get('submit'))
            {
               $errors = $this->validation->validate($post, 'Console');
               if(!$errors) 
               {
                 $this->consoleDAO->editConsole($post, $consoleId, $this->session->get('id'));
                 $this->session->set('edit_console', 'La console a bien été modifié');
                 header('Location: ../public/index.php?route=administration');
                }
                return $this->view->render('edit_console', [
                'post' => $post,
                'errors' => $errors
                 ]);
 
            }
          $post->set('id', $console->getId());
          $post->set('title', $console->getTitle());
          $post->set('content', $console->getContent());
          $post->set('media', $console->getMedia());
          $post->set('marque_id', $console->getMarque_id());
          $post->set('date', $console->getDate());

          return $this->view->render('edit_console', [
            'post' => $post
          ]);
        }
    }

      //Méthode pour suprimer une console
      public function deleteConsole($consoleId)
      {
          if($this->checkAdmin()) 
          {
          $this->consoleDAO->deleteConsole($consoleId);
          $this->session->set('delete_console', 'La console a bien été supprimé');
          header('Location: ../public/index.php?route=administration');
          }
      }

  //**********************    METHODES MARQUES     ************* *************************//   

         //Méthode pour ajoutée une marque

    public function addMarque(Parameter $post)
    {
        if($this->checkAdmin()) 
        {
          if($post->get('submit'))
           {
              $errors = $this->validation->validate($post, 'Marque');
              if(!$errors)
               {
                $this->marqueDAO->addMarque($post, $this->session->get('id'));
                $this->session->set('add_marque', 'La nouvelle marque a bien été ajouté');
                header('Location: ../public/index.php?route=administration');
               }
              return $this->view->render('add_marque', [
                'post' => $post,
                'errors' => $errors
              ]);
            }
          return $this->view->render('add_marque');
        }
    }

     //Méthode pour modifier une marque

     public function editMarque(Parameter $post, $marqueId)
     {
         if($this->checkAdmin()) 
         {
            $marque = $this->marqueDAO->getMarque($marqueId);
            if($post->get('submit'))
             {
                $errors = $this->validation->validate($post, 'Marque');
                if(!$errors) 
                {
                  $this->marqueDAO->editMarque($post, $marqueId, $this->session->get('id'));
                  $this->session->set('edit_marque', 'La marque a bien été modifié');
                  header('Location: ../public/index.php?route=administration');
                 }
                 return $this->view->render('edit_marque', [
                 'post' => $post,
                 'errors' => $errors
                  ]);
  
             }
           $post->set('id', $marque->getId());
           $post->set('title', $marque->getTitle());
           $post->set('logo', $marque->getLogo());
           $post->set('infos', $marque->getInfos());
           $post->set('pub', $marque->getPub());
           $post->set('date', $marque->getDate());
 
           return $this->view->render('edit_marque', [
             'post' => $post
           ]);
         }
     }

      //Méthode pour suprimer une marque

      public function deleteMarque($marqueId)
      {
          if($this->checkAdmin()) 
          {
          $this->marqueDAO->deleteMarque($marqueId);
          $this->session->set('delete_marque', 'La marque a bien été supprimé');
          header('Location: ../public/index.php?route=administration');
          }
      }

 //**********************METHODES JEUX ***********************//
 
 
      //Méthode pour ajoutée un jeux

    public function addJeux(Parameter $post)
    {
        if($this->checkAdmin()) 
        {
          if($post->get('submit'))
           {
              $errors = $this->validation->validate($post, 'Jeux');
              if(!$errors)
               {
                $this->jeuxDAO->addJeux($post, $this->session->get('id'));
                $this->session->set('add_jeux', 'Le nouveau jeux a bien été ajouté');
                header('Location: ../public/index.php?route=administration');
               }
              return $this->view->render('add_jeux', [
                'post' => $post,
                'errors' => $errors
              ]);
            }
          return $this->view->render('add_jeux');
        }
    }

      //Méthode pour modifier un jeux
    public function editJeux(Parameter $post, $jeuxId)
    {
        if($this->checkAdmin()) 
        {
           $jeux = $this->jeuxDAO->getJeux($jeuxId);
           if($post->get('submit'))
            {
               $errors = $this->validation->validate($post, 'Jeux');
               if(!$errors) 
               {
                 $this->jeuxDAO->editJeux($post, $jeuxId, $this->session->get('id'));
                 $this->session->set('edit_jeux', 'Le jeux a bien été modifié');
                 header('Location: ../public/index.php?route=administration');
                }
                return $this->view->render('edit_jeux', [
                'post' => $post,
                'errors' => $errors
                 ]);
 
            }
          $post->set('id', $jeux->getId());
          $post->set('title', $jeux->getTitle());
          $post->set('content', $jeux->getContent());
          $post->set('console_id', $jeux->getConsole_id());
          $post->set('extrait', $jeux->getExtrait());
          $post->set('image', $jeux->getImage());
          $post->set('date', $jeux->getDate());

          return $this->view->render('edit_jeux', [
            'post' => $post
          ]);
        }
    }

      //Méthode pour suprimer un jeux

    public function deleteJeux($jeuxId)
    {
        if($this->checkAdmin()) 
        {
        $this->jeuxDAO->deleteJeux($jeuxId);
        $this->session->set('delete_jeux', 'Le jeux a bien été supprimé');
        header('Location: ../public/index.php?route=administration');
        }
    }



    //Méthode pour suprimer un commentaire
    public function deleteComment($commentId)
    {
        if($this->checkAdmin()) 
        {
        $this->commentDAO->deleteComment($commentId);
        $this->session->set('delete_comment', 'Le commentaire a bien été supprimé');
        header('Location: ../public/index.php');
        }
    }

     // designaliser un commentaire
    public function unflagComment($commentId)
    {
        if($this->checkAdmin()) 
        {
        $this->commentDAO->unflagComment($commentId);
        $this->session->set('unflag_comment', 'Le commentaire a bien été désignalé');
        header('Location: ../public/index.php?route=administration');
        }
    }

    //Méthode profile 
    public function profile()
    {
        if($this->checkLoggedIn())
        {
        return $this->view->render('profile');
        }
    }

     //Changé le mot de passe
    public function updatePassword(Parameter $post)
    {
        if($this->checkLoggedIn())
        {
          if($post->get('submit'))
          {
            $this->userDAO->updatePassword($post, $this->session->get('pseudo'));
            $this->session->set('update_password', 'Le mot de passe a été mis à jour');
            header('Location: ../public/index.php?route=profile');
          }
        return $this->view->render('update_password');
        }

    }
     //deconexion
    public function logout()
    {
        if($this->checkLoggedIn())
        {
        $this->logoutOrDelete('logout');
        }
    }
    //supression de compte
    public function deleteAccount()
    {
        if($this->checkLoggedIn())
        {
        $this->userDAO->deleteAccount($this->session->get('pseudo'));
        $this->logoutOrDelete('delete_account');
        }
    }
     //supression d'un utilisateur par l'adminitrateur
    public function deleteUser($userId)
    {
        if($this->checkAdmin())
        {
        $this->userDAO->deleteUser($userId);
        $this->session->set('delete_user', 'L\'utilisateur a bien été supprimé');
        header('Location: ../public/index.php?route=administration');
        }
    }

    //refactorisation logout et delete 
    private function logoutOrDelete($param)
    {
        $this->session->stop();
        $this->session->start();
        if($param === 'logout') {
            $this->session->set($param, 'À bientôt');
        } else {
            $this->session->set($param, 'Votre compte a bien été supprimé');
        }
        header('Location: ../public/index.php');
    }
}