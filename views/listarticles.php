<?php $this->title = 'Listarticles'; ?>




<?php
foreach ($articles as $article)
{
    ?>
    <div id='list_article' class = 'list_article'>
        <h2 class="btn"><a href="../public/index.php?route=article&articleId=<?= htmlspecialchars($article->getId());?>"><?= htmlspecialchars($article->getTitle());?></a></h2>
        <p> <?php
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
      </p>
       
        <p>Creer le : <?= htmlspecialchars($article->getCreatedAt());?></p>
    </div>
    <br>
    <?php
}
?>
