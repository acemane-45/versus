<div class='form_comment'>
<form method="post" action="../public/index.php?route=addComment&articleId=<?= strip_tags($article->getId()) ?>">
    <label for="pseudo">Pseudo</label><br>
    <input type="text" id="pseudo" name="pseudo" ><br>

    <label for="content">Message</label>
    
    <textarea id="comment" name="content"></textarea>


    <label for="content">Note</label>
    <input type="text" id="note" name="note" ><br>
    <input type="submit" value="Ajouter" id="submit" name="submit">
</form>


</div>