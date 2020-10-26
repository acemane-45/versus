<?php
$route = isset($post) && $post->get('id') ? 'editArticle&articleId='.$post->get('id') : 'addArticle';
$submit = $route === 'addArticle' ? 'Envoyer' : 'Mettre a jour';
$title = isset($article) && $article->getTitle() ? htmlspecialchars($article->getTitle()) : '';

$jaquette = isset($article) && $article->getJaquette() ? htmlspecialchars($article->getJaquette()) : '';

$demo = isset($article) && $article->getDemo() ? htmlspecialchars($article->getDemo()) : '';

$content = isset($article) && $article->getContent() ? htmlspecialchars($article->getContent()) : '';

?>


<div class = 'form_article'>
<form method="post" action="../public/index.php?route=<?= $route; ?>">
    <label for="title">Titre</label><br>
    <input type="text" id="title" name="title" value="<?= isset($post) ? html_entity_decode($post->get('title')): ''; ?>"><br>
    <?= isset($errors['title']) ? $errors['title'] : ''; ?>

    <label for="jaquette">Jaquette</label><br>
    <input type="text" id="jaquette" name="jaquette" value="<?= isset($post) ? html_entity_decode($post->get('jaquette')): ''; ?>"><br>
    <?= isset($errors['jaquette']) ? $errors['jaquette'] : ''; ?>

    <label for="demo">Demo</label><br>
    <input type="text" id="demo" name="demo" value="<?= isset($post) ? html_entity_decode($post->get('demo')): ''; ?>"><br>
    <?= isset($errors['demo']) ? $errors['demo'] : ''; ?>

    <label for="content">Contenu</label><br>
    <textarea id="myText" name="content"><?= isset($post) ? html_entity_decode($post->get('content')): ''; ?></textarea><br>
    <?= isset($errors['content']) ? $errors['content'] : ''; ?>

    <input type="submit" value="<?= $submit; ?>" id="submit" name="submit">
</form>

</div>