<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Versus</title>
    <!-- Bootstrap core CSS --> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="../public/css/style.css">
  </head>
  <body>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="../public/index.php">Accueil</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
        
    <div class="collapse navbar-collapse" id="navbarSupportedContent">   
        <ul class="navbar-nav ml-auto">

        <?php if ($this->session->get('pseudo')) { 
        ?>

            <li class="nav-item">
               <a class="nav-link" href="../public/index.php?route=logout">Deconnexion</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="../public/index.php?route=profile">Profil</a>
            </li>
        <?php if($this->session->get('role') === 'admin') {
        ?>
            <li class="nav-item">
               <a class="nav-link" href="../public/index.php?route=administration">Administration</a></li>
    
        <?php } 
        } else {
        ?>
            <li class="nav-item">
                <a class="nav-link" href="../public/index.php?route=login">Connexion</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../public/index.php?route=register">Inscription</a>
            </li>

        <?php
            }
        ?>
        </ul>
     </div>
    </nav>
    
    <div id="content">
    
   
        <?= $content ?>

    </div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
