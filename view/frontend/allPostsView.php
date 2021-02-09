<?php
$title = "Oeuvre complete";
require('template.php');
?>
<div class="container">
    <div class="jumbotron">
        <?php
        while ($data = $posts->fetch()) {
        ?>
            <h3>
                <?= htmlspecialchars($data['title']) ?>
                <em>le <?= $data['creation_date_fr'] ?></em>
            </h3>
            <p>
                <?= nl2br(htmlspecialchars($data['content'])) ?>
                <br />
                <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
            </p>
        <?php
        }
        $posts->closeCursor();
        ?>
    </div>
</div>