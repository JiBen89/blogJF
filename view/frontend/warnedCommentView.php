<?php require('template.php') ?>
<div class="container">
<h2>Liste des commentaires signalés</h2>
<?php
if (isset($comments)) {
    foreach ($comments as $a) {
        echo "<p>";
        echo $a["comment"];
        echo "  <a href=index.php?action=deletComment&idComment=" . $a['id'] . " role=\"button\" class=\"btn btn-danger\" > suprimer </a>
        ou <a href=index.php?action=removeWarned&idComment=" . $a['id'] . "  role=\"button\" class=\"btn btn-success\" > enlever le signalement </a> </br>";
        echo "</p>";
    }
}
echo "</div>";