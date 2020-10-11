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

foreach ($marques as $marque)
{
    ?>
    <div class='home_view'>
        <h2 class="btn"><a href="../public/index.php?route=consoles&marqueId=<?= htmlspecialchars_decode($marque->getId());?>"><?= htmlspecialchars_decode($marque->getName());?></a></h2>
      
        
      
       
      <p>Creer le : <?= htmlspecialchars($marque->getName());?></p>
    </div>
    <br>
    <?php
}
    
       
      
    



