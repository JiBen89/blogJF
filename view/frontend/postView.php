<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
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
while ($comment = $comments->fetch())
{
?>
    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?>
    <a href="index.php?action=warnComment&amp;id=<?= $comment['id'] ?>">(signaler)</a></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
<?php
}
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
    <div>
        <p><?php echo ('commenté en tant que '. $_SESSION['pseudo']) ?></p>
    </div>
    <div>
        <?php 
            if (!empty($_SESSION['pseudo']))
            {
                echo '<label for="comment">Commentaire</label><br /><textarea id="comment" name="comment"></textarea>';            
            }
        ?>
    </div>
    <div> 
        <?php     
            if (!empty($_SESSION['pseudo'])){
                echo '<input type="submit" />';
            }
        ?>
    </div>
</form>