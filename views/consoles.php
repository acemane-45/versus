<?php $this->title = 'Consoles'; ?>


<?= $this->session->show('add_comment'); ?>
<?= $this->session->show('flag_comment'); ?>
<?= $this->session->show('delete_comment'); ?>
<?= $this->session->show('register'); ?>
<?= $this->session->show('login'); ?>
<?= $this->session->show('logout'); ?>
<?= $this->session->show('delete_account'); ?>

    


        
    <ul></ul>
<?php

foreach ($consoles as $console)
{
    ?>
    <div class='home_view'>
        <h2 class="btn"><a href="../public/index.php?route=jeux&consoleId=<?= htmlspecialchars_decode($console->getId());?>"><?= htmlspecialchars_decode($console->gettitle());?></a></h2>
      
        
      
       
      <p>Creer le : <?= htmlspecialchars($console->getTitle());?></p>
    </div>
    <br>
    <?php
}
  