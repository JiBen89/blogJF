<?php require('template.php'); ?>
<form action="index.php?action=writeNewPost" method="post">

    <label for="newTitle">Titre   :</label>
        <input id="newTitle" name="newTitle"/></br>
    <label for="newPost">Contenu</label>
        <textarea id="newPost" name="newPost">
        </textarea>
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
    <div>
        <input type="submit" />
    </div>
    
</form>