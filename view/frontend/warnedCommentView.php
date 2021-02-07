<?php require('template.php') ?>

<h2>Liste des commentaires signalés</h2>

<?php 
foreach ($comments as $a)
{
echo "<p>";
echo $a["comment"];
echo " <a href=index.php?action=deletComment&idComment=". $a['id'] . " > suprimer </a> ou <a> enlever le signalement </a> </br>";
echo "</p>";
}