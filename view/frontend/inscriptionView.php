<?php
require('template.php'); 
$title = "inscription";
?>
<div class="container">
    <h2>Inscription</h2>

    <form action="index.php?action=inscriptionViewPost" method="post">
        <div>
            <label for="pseudo">Pseudo</label>
            <input type="text" id="pseudo" name="pseudo" />
        </div>
        <div>
            <label for="pass">Mot de passe</label>
            <input id="pass" type="password" name="pass" />
        </div>
        <div>
            <label for="passCheck">Vérification mot de passe</label>
            <input id="passCheck" type="password" name="passCheck" />
        </div>
        <div>
            <label for="mail">Email</label>
            <input id="mail" type="email" name="mail" />
        </div>
        <div>
            <input type="submit" class="btn btn-dark" />
        </div>
    </form>
</div>