<!DOCTYPE html>
<html lang="fr">

<head>
    <title><?= $title ?></title>
    <meta name="description" content="The Game" />
    <meta charset=UTF-8>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="https://cdn.tiny.cloud/1/0wbmvo8vn0e8rwzz6wz60khgj1e86n1soo6sz9wjf6qtdaer/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
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
        <div id="menu1" class="menu ">
            <ul>
                <li class="btn"><a href="../public/index.php">Accueil</a></li>
                <li class="btn"><a href="../public/index.php?route=articles">Articles</a></li>
                <li class="btn"><a href="../public/index.php?route=listarticles">liste des articles</a></li>
                <li class="btn"><a href="../public/index.php?route=jeux">Vidéos de jeux</a></li>

                <?php
                   if ($this->session->get('pseudo')) {
                ?>
                <li class="btn"> <a href="../public/index.php?route=logout">Deconnexion</a></li>
                <li class="btn"> <a href="../public/index.php?route=profile">Profil</a></li>

                <?php if($this->session->get('role') === 'admin') { ?>
                <li class="btn"> <a href="../public/index.php?route=administration">Administration</a></li>

                <?php } 
                } else {
                ?>

                <li class="btn"> <a href="../public/index.php?route=register">Inscription</a></li>
                <li class="btn"> <a href="../public/index.php?route=login">Connexion</a></li>

                <?php
                }
                ?>
            </ul>
        </div>
        <div class="entete">
            <h1>Versus</h1>

            <div class="titre">

                <div class="contenu">
                    <h3>Il y a bien longtemps, dans une galaxie lointaine…</h3>
                    <p>début des années 90, où le secteur des consoles est segmenté par deux acteurs diamétralement
                        opposés : Nintendo et SEGA.</p>
                </div>
            </div>
        </div>
    </header>

    <div id="slider">
       

    </div>
    <div id="content">


        <?= $content ?>

    </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.0/jquery.min.js'></script>
    <script src="js/App.js"></script>
    <script src="js/Slider.js"></script>
</body>