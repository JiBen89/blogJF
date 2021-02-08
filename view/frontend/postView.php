<?php $title = htmlspecialchars($post['title']); ?>

<?php require('template.php'); ?>
<h1>Blog de J.Forteroche</h1>
<p><a href="index.php">Retour à la liste des billets</a></p>

<div class="news">
    <h3>
        <?= htmlspecialchars($post['title']) ?>
        <em>le <?= $post['creation_date_fr'] ?></em>
    </h3>

    <p>
        <?= nl2br(htmlspecialchars($post['content'])) ?>
    </p>
</div>

<h2>Commentaires</h2>

<?php
while ($comment = $comments->fetch()) {
?>
    <p><strong><?= htmlspecialchars($comment['idAuthor']) ?></strong> le <?= $comment['comment_date_fr'] ?>
        <a href="index.php?action=warnComment&amp;id=<?= $comment['id'] ?>">(signaler)</a>
    </p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
<?php
}
?>
<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
    <div>
        <p><?php
            if (!empty($_SESSION['idUser'])) {
                echo ('commenté en tant que ' . $_SESSION['idUser']);
            }
            ?></p>
    </div>
    <div>
        <?php
        if (!empty($_SESSION['idUser'])) {
            echo '<label for="comment">Commentaire</label><br /><textarea id="comment" name="comment"></textarea>';
        }
        ?>
    </div>
    <div>
        <?php
        if (!empty($_SESSION['idUser'])) {
            echo '<input type="submit" />';
        }
        ?>
    </div>
</form>