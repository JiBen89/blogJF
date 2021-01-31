<?php require('template.php'); ?>
    <h2>Quel billet voulez vous modifier ?</h2>
        <p>
        <?php
        while ($postsList = $posts->fetch())
            {
        ?>
            <?= $postsList['title'] ?>
        </p>
        <?php
            }
            $posts->closeCursor();