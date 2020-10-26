<?php $this->title = 'Mon profil'; ?>

<?= $this->session->show('update_password'); ?>
<div class='profile'>
    <h2><?= $this->session->get('pseudo'); ?></h2>
    <p><?= $this->session->get('id'); ?></p>
    <a href="../public/index.php?route=updatePassword">Modifier son mot de passe</a>
    <a href="../public/index.php?route=deleteAccount">Supprimer mon compte</a>
</div>
<br>
