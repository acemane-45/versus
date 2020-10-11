<?php
$route = isset($post) && $post->get('id') ? 'edit_media&mediaId='.$post->get('id') : 'add_media';
$submit = $route === 'add_media' ? 'Envoyer' : 'Mettre a jour';
$extrait = isset($media) && $media->getExtrait() ? htmlspecialchars($media->getExtrait()) : '';
$image = isset($media) && $media->getImage() ? htmlspecialchars($media->getImage()) : '';
$jeux_id = isset($media) && $media->getJeux_id() ? htmlspecialchars($media->getJeux_id()) : '';



?>


<div class = 'form_media'>
<form method="post" action="../public/index.php?route=<?= $route; ?>">
    <label for="title">Extrait</label><br>
    <input type="text" id="extrait" name="extrait" value="<?= isset($post) ? html_entity_decode($post->get('extrait')): ''; ?>"><br>
    <?= isset($errors['extrait']) ? $errors['extrait'] : ''; ?>
    <label for="content">Image</label><br>
    <textarea id="myText" name="image"><?= isset($post) ? html_entity_decode($post->get('image')): ''; ?></textarea><br>
    <?= isset($errors['image']) ? $errors['image'] : ''; ?>
    <label for="title">Jeux_id</label><br>
    <input type="text" id="jeux_id" name="jeux_id" value="<?= isset($post) ? html_entity_decode($post->get('jeux_id')): ''; ?>"><br>
    <?= isset($errors['jeux_id']) ? $errors['jeux_id'] : ''; ?>
    <input type="submit" value="<?= $submit; ?>" id="submit" name="submit">
</form>

</div>