<?php $this->title = 'Administration'; ?>


<?= $this->session->show('add_article'); ?>
<?= $this->session->show('edit_article'); ?>
<?= $this->session->show('delete_article'); ?>
<?= $this->session->show('unflag_comment'); ?>
<?= $this->session->show('delete_comment'); ?>
<?= $this->session->show('delete_user'); ?>


<h2 class="tire_admin">Articles</h2>
<div id="article_admin" class="article_admin">
<table>
    <tr id="info_article" class="info_article">
      
        <td>Titre</td>
        <td>Contenu</td>
        <td>Actions</td>
    </tr>
    <?php
    foreach ($articles as $article)
    {
        ?>
        <tr>
            
            <td class="btn"><a href="../public/index.php?route=article&articleId=<?= htmlspecialchars($article->getId());?>"><?= htmlspecialchars($article->getTitle());?></a></td>
            <td class="list_article"> <?php
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
            </td>
            
            <td class="action_admin">
                <a href="../public/index.php?route=editArticle&articleId=<?= $article->getId(); ?>">Modifier</a>
                <a href="../public/index.php?route=deleteArticle&articleId=<?= $article->getId(); ?>">Supprimer</a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>

<a class="news" href="../public/index.php?route=addArticle">Nouvel article</a>

</div>
<div id="comment_admin" class="comment_admin">
<h2>Commentaires signalés</h2>
<table>
    <tr id="info_com" class="info_com">
        <td>Id</td>
        <td>Pseudo</td>
        <td>Message</td>
        <td>Date</td>
        <td>Actions</td>
    </tr>
    <?php
    foreach ($comments as $comment)
    {
        ?>
        <tr>
            <td id="id_com"><?= htmlspecialchars($comment->getId());?></td>
            <td><?= htmlspecialchars($comment->getPseudo());?></td>
            <td><?= substr(htmlspecialchars($comment->getContent()), 0, 150);?></td>
            <td id="date_com">Créé le : <?= htmlspecialchars($comment->getCreatedAt());?></td>
            <td id="action_com">
               <a href="../public/index.php?route=unflagComment&commentId=<?= $comment->getId(); ?>">Désignaler le commentaire</a>
               <a href="../public/index.php?route=deleteComment&commentId=<?= $comment->getId(); ?>">Supprimer le commentaire</a>
            </td>
        </tr>
       
        <?php
    }
    ?>
</table>

</div>
<div id="user" class="user">
<h2>Utilisateurs</h2>
<table>
    <tr id="info_user" class="info_user">
        <td id="id_user">Id</td>
        <td>Pseudo</td>
        <td>Date</td>
        <td>Rôle</td>
        
    </tr>
 
    <?php
    foreach ($users as $user)
    {
        ?>
        <tr>
            <td id="id_user"><?= htmlspecialchars($user->getId());?></td>
            <td><?= htmlspecialchars($user->getPseudo());?></td>
            <td id="date_user">Créé le : <?= htmlspecialchars($user->getCreatedAt());?></td>
            <td><?= htmlspecialchars($user->getRole());?></td>
            <td>
            <td>
                <?php
                if($user->getRole() != 'admin') {
                ?>
                <a href="../public/index.php?route=deleteUser&userId=<?= $user->getId(); ?>">Supprimer</a>
                <?php }
                else {
                    ?>
                Suppression impossible
                <?php
                }
                ?>
            </td>
        </tr>
        <br>
        <?php
       
    }
    ?>
</table>
</div>