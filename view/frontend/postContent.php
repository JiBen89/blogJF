<?php require('template.php'); ?>
<script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
   });
  </script>
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