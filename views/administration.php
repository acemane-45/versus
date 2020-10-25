<?php $this->title = 'Administration'; ?>


<?= $this->session->show('add_jeux'); ?>
<?= $this->session->show('edit_jeux'); ?>
<?= $this->session->show('delete_jeux'); ?>
<?= $this->session->show('unflag_comment'); ?>
<?= $this->session->show('delete_comment'); ?>
<?= $this->session->show('delete_user'); ?>

<h1>liste des jeux</h1>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Suprimer</th>
      <th scope="col">Modifier</th>
    </tr>
  </thead>
  <tbody>
    <tr>
   
      
      <th scope="row">1</th>
      
      <td></td>
      
    </tr>
   
    <tr>
      <th scope="row">2</th>
      <td><a class="btn btn-primary" href="../public/index.php?route=editJeux&jeuxId=<---------->" role="button">Modifier</a></td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td><a class="btn btn-primary" href="../public/index.php?route=DeleteJeux&jeuxId=<------>" role="button">Suprimer</a></td>
    </tr>
  </tbody>
</table>

  

<a class="news" href="../public/index.php?route=addJeux">Nouveau Jeux</a>

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