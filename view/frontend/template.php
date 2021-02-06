<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="public/css/style.css" rel="stylesheet" /> 
        <script src="https://cdn.tiny.cloud/1/3f9xi2nz40uwz999ls1jqpvj4386kr5icqy1wv7ce2lj9hlj/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    </head> 
    <body>
        <header>
            <?php 
            if(empty($_SESSION['pseudo']))
            {
                echo '<a href="index.php?action=inscriptionView">Inscription </a>'.'<a href="index.php?action=connectionView">Connexion </a>';
            }
            else{
                echo 'Bonjour ' . $_SESSION['pseudo'] .' '. ' <a href="index.php?action=disconect"> déconexion </a> </br>';
                if($_SESSION['adm'] == 1){
                    echo 'vous êtes connecté entant qu\'administrateur </br>
                    Pour écrire les billets : <a id="writePost" href="index.php?action=writePostView"> Ecrire </a> </br>
                    Pour modifier les billets : <a href="index.php?action=updatePost"> Modifier </a> </br>
                    Liste des commentaires signlés : <a href="index.php?action=updateCommentView"> Modérer </a> </br>
                    ';
                }
            }
            ?>
        </header>
    </body>
</html>
