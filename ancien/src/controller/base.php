<!DOCTYPE html>
<html lang="fr">
<head>
    <title><?= $title ?></title>
    <meta name="description" content="Billet simple pour l'Alaska Un roman de Jean Forteroche" />
    <meta charset=utf-8>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/style.css" >
    <script src="https://cdn.tiny.cloud/1/0wbmvo8vn0e8rwzz6wz60khgj1e86n1soo6sz9wjf6qtdaer/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
    tinymce.init({
      selector: '#myText',
      plugins: '',
      toolbar_mode: 'floating',
    });
  </script>
</head>

<body>

  <header>
    <div class="entete">   
      <h1>JEAN FORTEROCHE</h1>

        <div class="titre">

           <h2>Un billet pour l'ALASKA</h2>
           <h2>Bienvenue sur mon blog</h2>

           <hr>
        </div>
    </div>


   
    <div id = "menu1" class="menu ">
      <ul>    
        <li class="btn"><a href="../public/index.php">Accueil</a></li>
        <li class="btn"><a href="../public/index.php?route=listarticles">liste des articles</a></li>

         <?php
           if ($this->session->get('pseudo')) {
        ?>
        <li class="btn"> <a href="../public/index.php?route=logout">Deconnexion</a></li>
        <li class="btn" > <a href="../public/index.php?route=profile">Profil</a></li>
       
        <?php if($this->session->get('role') === 'admin') { ?>
        <li class="btn" >  <a href="../public/index.php?route=administration">Administration</a></li>
    
        <?php } 
        } else {
        ?>

         <li class="btn" > <a href="../public/index.php?route=register">Inscription</a></li>
         <li class="btn"> <a href="../public/index.php?route=login">Connexion</a></li>
</ul>
         <?php
        }
        ?>
   
    </div>

    </header>

    <div id="content">
    
   
        <?= $content ?>

    </div>
    <footer>
  
     <p>Projet 4 DWJ OpenClassRooms  </p>
     <p> 2020 Tous droits réservés.</p>
    
    </footer>
</body>

