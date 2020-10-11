<?php
$route = isset($post) && $post->get('id') ? 'edit_jeux&jeuxId='.$post->get('id') : 'add_Jeux';
$submit = $route === 'add_Jeux' ? 'Envoyer' : 'Mettre a jour';
$title = isset($jeux) && $jeux->getTitle() ? htmlspecialchars($jeux->getTitle()) : '';
$content = isset($jeux) && $jeux->getContent() ? htmlspecialchars($jeux->getContent()) : '';
$date = isset($jeux) && $jeux->getDate() ? htmlspecialchars($jeux->getDate()) : '';
$console_id = isset($jeux) && $jeux->getConsole_id() ? htmlspecialchars($jeux->getConsole_id()) : '';


?>


<div class = 'form_jeux'>
<form method="post" action="../public/index.php?route=<?= $route; ?>">
    <label for="title">Titre</label><br>
    <input type="text" id="title" name="title" value="<?= isset($post) ? html_entity_decode($post->get('title')): ''; ?>"><br>
    <?= isset($errors['title']) ? $errors['title'] : ''; ?>
    <label for="content">Contenu</label><br>
    <textarea id="myText" name="content"><?= isset($post) ? html_entity_decode($post->get('content')): ''; ?></textarea><br>
    <?= isset($errors['content']) ? $errors['content'] : ''; ?>
    <label for="title">Date</label><br>
    <input type="text" id="date" name="date" value="<?= isset($post) ? html_entity_decode($post->get('date')): ''; ?>"><br>
    <?= isset($errors['date']) ? $errors['date'] : ''; ?>
    <label for="title">Console</label><br>
    <input type="text" id="console_id" name="console_id" value="<?= isset($post) ? html_entity_decode($post->get('console_id')): ''; ?>"><br>
    <?= isset($errors['console_id']) ? $errors['console_id'] : ''; ?>
    <input type="submit" value="<?= $submit; ?>" id="submit" name="submit">
</form>

</div>