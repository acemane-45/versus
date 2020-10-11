<?php $this->title = 'Accueil'; ?>



<div id="logo">
          <img  class="mon_logo" src="img/logo sega versus nintendo.png" alt="mon logo">
       </div>
       <div id="header_text" class="header_text">
          <h1>Il y a bien longtemps, dans une galaxie lointaine…</h1>
          <p>début des années 90, où le secteur des consoles est segmenté par deux acteurs diamétralement opposés : Nintendo et SEGA.</p>
       </div>


        
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
    
       
      
    



