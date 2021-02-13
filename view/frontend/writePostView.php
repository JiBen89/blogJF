<?php 
$title = "création de billet";
require('template.php');
?>
<div class="container">
<form action="index.php?action=writeNewPost" method="post">

    <label for="newTitle">Titre :</label>
    <input id="newTitle" name="newTitle" /></br>
    <label for="newPost">Contenu</label>
    <textarea id="newPost" name="newPost">
    </textarea>
    
    
    <script>
        tinymce.init({
            selector: 'textarea',
            language : "fr_FR",
            plugins: 'a11ychecker casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
            toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
            toolbar_mode: 'floating',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            entity_encoding : "raw",
            encoding: "html",
            forced_root_block : false,
            force_br_newlines : true,
            force_p_newlines : false,
        });
    </script>
    <div>
        <input type="submit" />
    </div>

</form>
</div>