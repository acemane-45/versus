<?php
$route = isset($post) && $post->get('id') ? 'edit_marque&marqueId='.$post->get('id') : 'add_marque';
$submit = $route === 'add_marque' ? 'Envoyer' : 'Mettre a jour';
$title = isset($marque) && $marque->getTitle() ? htmlspecialchars($marque->getTitle()) : '';
$infos = isset($marque) && $marque->getInfos() ? htmlspecialchars($marque->getInfos()) : '';
$date = isset($marque) && $marque->getDate() ? htmlspecialchars($marque->getDate()) : '';
$logo = isset($marque) && $console->getLogo() ? htmlspecialchars($marque->getLogo()) : '';
$pub = isset($pub) && $pub->getPub() ? htmlspecialchars($marque->getPub()) : '';


?>


<div class = 'form_marque'>
<form method="post" action="../public/index.php?route=<?= $route; ?>">
    <label for="title">Titre</label><br>
    <input type="text" id="title" name="title" value="<?= isset($post) ? html_entity_decode($post->get('title')): ''; ?>"><br>
    <?= isset($errors['title']) ? $errors['title'] : ''; ?>
    <label for="content">Infos</label><br>
    <textarea id="myText" name="infos"><?= isset($post) ? html_entity_decode($post->get('infos')): ''; ?></textarea><br>
    <?= isset($errors['infos']) ? $errors['infos'] : ''; ?>
    <label for="title">Date</label><br>
    <input type="text" id="date" name="date" value="<?= isset($post) ? html_entity_decode($post->get('date')): ''; ?>"><br>
    <?= isset($errors['date']) ? $errors['date'] : ''; ?>
    <label for="title">Logo</label><br>
    <input type="text" id="logo" name="logo" value="<?= isset($post) ? html_entity_decode($post->get('logo')): ''; ?>"><br>
    <?= isset($errors['logo']) ? $errors['logo'] : ''; ?>
    <label for="title">Pub</label><br>
    <input type="text" id="pub" name="pub" value="<?= isset($post) ? html_entity_decode($post->get('pub')): ''; ?>"><br>
    <?= isset($errors['pub']) ? $errors['pub'] : ''; ?>
    <input type="submit" value="<?= $submit; ?>" id="submit" name="submit">
</form>

</div>