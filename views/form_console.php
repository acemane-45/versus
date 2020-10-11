<?php
$route = isset($post) && $post->get('id') ? 'edit_console&consoleId='.$post->get('id') : 'add_console';
$submit = $route === 'add_console' ? 'Envoyer' : 'Mettre a jour';
$title = isset($console) && $console->getTitle() ? htmlspecialchars($console->getTitle()) : '';
$content = isset($console) && $console->getContent() ? htmlspecialchars($console->getContent()) : '';
$date = isset($console) && $console->getDate() ? htmlspecialchars($console->getDate()) : '';
$media = isset($console) && $console->getMedia() ? htmlspecialchars($console->getMedia()) : '';
$marque_id = isset($console) && $console->getMarque_id() ? htmlspecialchars($console->getMarque_id()) : '';


?>


<div class = 'form_console'>
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
    <label for="title">Marque</label><br>
    <input type="text" id="marque_id" name="marque_id" value="<?= isset($post) ? html_entity_decode($post->get('marque_id')): ''; ?>"><br>
    <?= isset($errors['marque_id']) ? $errors['marque_id'] : ''; ?>
    <label for="title">Media</label><br>
    <input type="text" id="media" name="media" value="<?= isset($post) ? html_entity_decode($post->get('media')): ''; ?>"><br>
    <?= isset($errors['media']) ? $errors['media'] : ''; ?>
    <input type="submit" value="<?= $submit; ?>" id="submit" name="submit">
</form>

</div>