<?php $this->title = "Article"; ?>


<div class='article'>
    <h2><?= htmlspecialchars($article->getTitle());?></h2>
       <p><?= html_entity_decode($article->getContent());?></p>
    
    <p>Créé le : <?= htmlspecialchars($article->getCreatedAt());?></p>
</div>

<br>
<div  class="actions">
    <a  href="../public/index.php?route=editArticle&articleId=<?= $article->getId(); ?>">Modifier</a>
    <a  href="../public/index.php?route=deleteArticle&articleId=<?= $article->getId(); ?>">Supprimer</a>
</div>
<br>

<?php
           if ($this->session->get('pseudo')) {
            ?>
<div id="comments" >
    <h3>Ajouter un commentaire</h3>
    <?php include('form_comment.php'); ?>
    <?php
} else {
   ?>
   Vous devez vous connecter pour ajouter un commentaire
    
 
<?php
}
?>

    <h3>Commentaires</h3>
    
   <?php

       foreach ($comments as $comment)
       {
        ?>
        <div class="comcom">
        <h4><?= strip_tags($comment->getPseudo());?></h4>
        <p><?= strip_tags($comment->getContent());?></p>
        <p>Posté le <?= strip_tags($comment->getCreatedAt());?></p>
        <?php
        if($comment->isFlag()) {
            ?>
            <p>Ce commentaire a déjà été signalé</p>
            <?php
        } else {
            ?>
            <p><a class="btn"  href="../public/index.php?route=flagComment&commentId=<?= $comment->getId(); ?>">Signaler le commentaire</a></p>
            <?php
        }
        ?>
        </div>
        <br>
        <?php
    }
    ?>
</div>