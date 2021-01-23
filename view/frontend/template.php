<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="public/css/style.css" rel="stylesheet" /> 
    </head>
        
    <body>
    <header>
        <a href="index.php?action=inscriptionView">Inscription</a>
        <a href="index.php?action=connectionView">Connexion</a>        
    </header>
        <?= $content ?>
    </body>
</html>
