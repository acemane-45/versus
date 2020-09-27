<?php

namespace App\src\DAO;

use App\config\Parameter;
use App\src\model\Article;

class ArticleDAO extends DAO
{
  
//**  private function buildObject($row)
  //  {
    //    $article = new Article();
      //  $article->setId($row['id']);
       // $article->setTitle($row['title']);
      //  $article->setContent($row['content']);
      
     //   $article->setCreatedAt($row['createdAt']);
     //   return $article;
    //** */}*/
 
        
    //Permet de récupérer la liste de tout les articles
    public function getArticles()
    {

        $sql = 'SELECT id, title, content, createdAt FROM article ORDER BY id DESC ';
        $result = $this->createQuery($sql);
        $articles = [];
        foreach ($result as $data){
            
            $articles[] = new Article($data);
        }
        $result->closeCursor();
        return $articles;
    }
    


    //pagination
    //Permet de récupérer les 3 dernier articles
    public function getArticlespagin()
    {
       
        
        $sql = 'SELECT id, title, content, createdAt FROM article ORDER BY id DESC LIMIT 3';
        $result = $this->createQuery($sql);
        $articles = [];
        foreach ($result as $data){
            
            $articles[] = new Article($data);
        }
        $result->closeCursor();
        return $articles;
    }
    
    
    //Permet de recupérer un article
    public function getArticle( $articleId)
    {
      
        $sql = 'SELECT id, title, content, createdAt FROM article WHERE id = ?';      
        $result = $this->createQuery($sql, [$articleId]);
      
        foreach ($result as $data){
          
            $article = new Article($data);
       }
       
        return $article;
    }
    
     

    //Permet d'ajouter un article dans la BDD
    public function addArticle(Parameter $post, $userId)
    {
        $sql = 'INSERT INTO article (title, content, createdAt, user_id) VALUES (?, ?, NOW(), ?)';
        $this->createQuery($sql, [$post->get('title'), $post->get('content'), $userId]);
    }
    

    //Permet de modifier un article dans la BDD
    public function editArticle(Parameter $post, $articleId)
    {
        $sql = 'UPDATE article SET title=:title, content=:content WHERE id=:articleId';
        $this->createQuery($sql, [
            'title' => $post->get('title'),
            'content' => $post->get('content'),
           
            'articleId' => $articleId
        ]);
    }

    //Permet de suprimer un article et son commentaire dans la BDD
    public function deleteArticle($articleId)
    {
        $sql = 'DELETE FROM comment WHERE article_id = ?';//commentaire
        $this->createQuery($sql, [$articleId]);
        $sql = 'DELETE FROM article WHERE id = ?';//article
        $this->createQuery($sql, [$articleId]);
    }
}