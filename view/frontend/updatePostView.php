<?php
require('template.php'); 
$title = "liste des billets a modifier";
?>
<div class="container">
<h2>Quel billet voulez vous modifier ?</h2>
<p>
    <?php
    while ($postsList = $posts->fetch()) {
    ?>
        le billet :
        <?= $postsList['title'] ?>
        <a href="index.php?action=getContent&amp;id=<?= $postsList['id'] ?>">Modifier</a>
        <a href="index.php?action=deletContent&amp;id=<?= $postsList['id'] ?>">Supprimer</a>

</p>
<?php
    }
    $posts->closeCursor();
    echo "</div>";