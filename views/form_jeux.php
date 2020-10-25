<?php
$route = isset($post) && $post->get('id') ? 'editJeux&jeuxId='.$post->get('id') : 'addJeux';
$submit = $route === 'addJeux' ? 'Envoyer' : 'Mettre a jour';
$console = isset($jeux) && $jeux->getConsole() ? htmlspecialchars($jeux->getConsole()) : '';
$title = isset($jeux) && $jeux->getTitle() ? htmlspecialchars($jeux->getTitle()) : '';
$jaquette = isset($jeux) && $jeux->getJaquette() ? htmlspecialchars($jeux->getJaquette()) : '';
$infos = isset($jeux) && $jeux->getInfos() ? htmlspecialchars($jeux->getInfos()) : '';
$extrait = isset($jeux) && $jeux->getExtrait() ? htmlspecialchars($jeux->getExtrait()) : '';
$createdAt = isset($jeux) && $jeux->getCreatedAt() ? htmlspecialchars($jeux->getCreatedAt()) : '';
?>


<div class = 'form_jeux'>
<form method="post" action="../public/index.php?route=<?= $route; ?>">
    <label for="console">Console</label><br>
    <input type="text" id="console" name="console" value="<?= isset($post) ? html_entity_decode($post->get('console')): ''; ?>"><br>
    <?= isset($errors['console']) ? $errors['console'] : ''; ?>
    <label for="title">Titre</label><br>
    <input type="text" id="title" name="title" value="<?= isset($post) ? html_entity_decode($post->get('title')): ''; ?>"><br>
    <?= isset($errors['title']) ? $errors['title'] : ''; ?>
    <label for="jaquette">Jaquette</label><br>
    <input type="text" id="jaquette" name="jaquette" value="<?= isset($post) ? html_entity_decode($post->get('jaquette')): ''; ?>"><br>
    <?= isset($errors['jaquette']) ? $errors['jaquette'] : ''; ?>
    <label for="extrait">Extrait</label><br>
    <input type="text" id="extrait" name="extrait" value="<?= isset($post) ? html_entity_decode($post->get('extrait')): ''; ?>"><br>
    <?= isset($errors['extrait']) ? $errors['extrait'] : ''; ?>
    <label for="infos">Infos</label><br>
    <textarea id="myText" name="infos"><?= isset($post) ? html_entity_decode($post->get('infos')): ''; ?></textarea><br>
    <?= isset($errors['infos']) ? $errors['infos'] : ''; ?>
    <label for="createdAt">CreatedAt</label><br>
    <input type="date" id="createdAt" name="createdAt" value="<?= isset($post) ? html_entity_decode($post->get('createdAt')): ''; ?>"><br>
    <?= isset($errors['createdAt']) ? $errors['createdAt'] : ''; ?>
    <input type="submit" value="<?= $submit; ?>" id="submit" name="submit">
</form>

</div>