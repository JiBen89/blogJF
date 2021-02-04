<?php require('template.php'); ?>
<p class="news"> </br>
    Actuellement : </br>
    <?= $content['content']; ?>
</p>

<p>
<form action="index.php?action=newContent" method="post">
    <label for="newTitle"> Titre</label>
        <input id="newTitle" name="newTitle" />
    <label for="newContent">Nouveau contenu :</label>
        <textarea id="newContent" name="newContent">
    </textarea>
    <input type="hidden" name="postId" value="<?= $_GET['id'] ?>" />
    <div>
        <input type="submit" />
    </div>
    </p>

</form>