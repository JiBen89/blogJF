<?php
require('template.php');
$title = 'acceuil';
?>

<div class="container-fluide">
    <div class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="public/images/alaska1.jpg" class="d-block w-100 h-25" alt="paysages alaska">
                    <div class="carousel-caption d-none d-md-block">
                    <h1 class="text-center text-dark">Billet simple pour l'Alaska</h1>
                    <h3 class="text-center text-dark">Derniers billets du blog :</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-md-none">
        <h1 class="text-center">Billet simple pour l'Alaska</h1>
        <h3 class="text-center">Derniers billets du blog :</h3>
    </div>
</div>
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