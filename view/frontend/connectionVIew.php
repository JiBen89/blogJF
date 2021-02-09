<?php
require('template.php'); 
$title = "connexion";
?>
<div class="container">
    <h2>Connexion</h2>
    <form action="index.php?action=connectionViewPost" method="post">
        <div>
            <label for="pseudo">Pseudo</label><br />
            <input type="text" id="pseudo" name="pseudo" />
        </div>
        <div>
            <label for="pass">Mot de passe</label><br />
            <input type="password" id="pass" name="pass" />
        </div>
        <div>
        </br>
            <input type="submit" class="btn btn-dark" />
        </div>
    </form>
</div>