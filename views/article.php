<?php $this->title = 'Article'; ?>

<?php
   foreach ($articles as $article)
   {
    ?>
<div class='article_view'>
    <h2 class="btn"><a
            href="../public/index.php?route=article&articleId=<?= htmlspecialchars_decode($article->getId());?>"><?= htmlspecialchars_decode($article->getTitle());?></a>
    </h2>

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
<?php
}
?>