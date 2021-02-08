<?php require('template.php') ?>

<h2>Liste des commentaires signalés</h2>

<?php
if (isset($comments)) {
    foreach ($comments as $a) {
        echo "<p>";
        echo $a["comment"];
        echo " <a href=index.php?action=deletComment&idComment=" . $a['id'] . " > suprimer </a> ou <a href=index.php?action=removeWarned&idComment=" . $a['id'] . "  > enlever le signalement </a> </br>";
        echo "</p>";
    }
}
