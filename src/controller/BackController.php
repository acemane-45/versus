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
          $jeux = $this->jeuxDAO->getJeux();
          $comments = $this->commentDAO->getFlagComments();
          $users = $this->userDAO->getUsers();
          return $this->view->render('administration', [
            'jeux' => $jeux,
            'comments' => $comments,
            'users' => $users
           ]);
        }
    }
    
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
           $article = $this->jeuxDAO->getJeux($jeuxId);
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
          $post->set('jaquette', $article->getJaquette());
          $post->set('createdAt', $article->getCreatedAt());
          $post->set('infos', $article->getInfos());
          $post->set('extrait', $article->getExtrait());

          return $this->view->render('edit_jeux', [
            'post' => $post
          ]);
        }
    }

     //Méthode pour suprimer un article
    public function deleteJeux($jeuxId)
    {
        if($this->checkAdmin()) 
        {
        $this->articleDAO->deleteJeux($jeuxId);
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