<?php 
$title = "modification de billet";
require('template.php');
?>
<div class="container">
<script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
        toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
        toolbar_mode: 'floating',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        entity_encoding: "raw",
        encoding: "html",
        forced_root_block: false,
        force_br_newlines: true,
        force_p_newlines: false,
    });
</script>
<p>
<form action="index.php?action=newContent" method="post">
    <label for="newTitle"> Titre</label>
    <input id="newTitle" name="newTitle" value="<?= $content['title']; ?>" />
    <label for="newContent">Nouveau contenu :</label>
    <textarea id="newContent" name="newContent">
        <?= $content['content']; ?>
    </textarea>
    <input type="hidden" name="postId" value="<?= $_GET['id'] ?>" />
    <div>
        <input type="submit" />
    </div>
    </p>

</form>
</div>