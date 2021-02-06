<h2>Quel billet voulez vous modifier ?</h2>
<p>
    <?php
    while ($postsList = $posts->fetch()) {
    ?>
        <?= $postsList['id'] ?>
        <?= $postsList['title'] ?>
        <a href="index.php?action=getContent&amp;id=<?= $postsList['id'] ?>">Modifier</a>

</p>
<?php
    }
    $posts->closeCursor();
