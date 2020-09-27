<?php $this->title = 'Accueil'; ?>



<?= $this->session->show('add_comment'); ?>
<?= $this->session->show('flag_comment'); ?>
<?= $this->session->show('delete_comment'); ?>
<?= $this->session->show('register'); ?>
<?= $this->session->show('login'); ?>
<?= $this->session->show('logout'); ?>
<?= $this->session->show('delete_account'); ?>

    
<ul></ul>
<?php
foreach ($articles as $article)
{
    ?>
    <div class='article_view'>
        <h2 class="btn"><a href="../public/index.php?route=article&articleId=<?= htmlspecialchars_decode($article->getId());?>"><?= htmlspecialchars_decode($article->getTitle());?></a></h2>
      
      <?php
      if(strlen($article->getContent()) <=100)
      {
          $content = $article->getContent();
      }
      else
      {

        $start = substr($article->getContent(), 0, 100);
        $start = substr($start, 0, strrpos($start, ' ')) .'[...]';
        $content = $start;
      }
      echo $content; 
      ?>
      
       
        <p>Creer le : <?= htmlspecialchars($article->getCreatedAt());?></p>
    </div>
    <br>
    <?php
}
?>