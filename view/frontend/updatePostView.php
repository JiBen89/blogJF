<?php require('template.php'); ?>
<h2>Quel billet voulez vous modifier ?</h2>
<p>
    <?php
    while ($postsList = $posts->fetch()) {
    ?>
        <?= $postsList['id'] ?>
        <?= $postsList['title'] ?>
        <a href="index.php?action=getContent&amp;id=<?= $postsList['id'] ?>">Modifier</a>
        <a href="index.php?action=deletContent&amp;id=<?= $postsList['id'] ?>">Supprimer</a>

</p>
<?php
    }
    $posts->closeCursor();
