<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title> <?php echo "J.Ferteroche" ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdn.tiny.cloud/1/3f9xi2nz40uwz999ls1jqpvj4386kr5icqy1wv7ce2lj9hlj/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<body>
    <header class="container-fluide bg-dark">
        <div class="container">
        <?php
        if (empty($_SESSION['pseudo'])) {
            echo '<div class="navbar-expand navbar-dark">
                <a href="index.php?action=inscriptionView" class="navbar-brand">Inscription </a>' .
                '<a href="index.php?action=connectionView" class="navbar-brand">Connexion </a>'. 
                '<a href="index.php" class="navbar-brand">Acceuil</a></div>';
        } else {
            echo '<p class="text-right text-light"> Bonjour ' . $_SESSION['pseudo'] . ' ' . ' <a href="index.php?action=disconect" class="text-light"> (déconexion) </a></br></p>';
            echo '<div class="navbar-expand navbar-dark ">
                            <div class="row">
                                <a href="index.php?action=bioAuthor" class="navbar-brand col"> A propos de Jean Forteroche</a> 
                                <a href="index.php?action=allPosts" class="navbar-brand col"> L\'oeuvre complète </a>
                                <a href="index.php?" class="navbar-brand col"> Retour a l\'acceuil </a>
                            </div>
                        </div>';
            
            if ($_SESSION['adm'] == 1) {
                echo '<div class="navbar-expand bg-light navbar-light ">
                            <div class="row">
                                <p class="col navbar-brand">Mode administration</p>
                                <a href="index.php?action=writePostView" class="navbar-brand col"> Ecrire  des billets </a> 
                                <a href="index.php?action=updatePost" class="navbar-brand col"> Modifier ou supprimer des billets </a>
                                <a href="index.php?action=warnedCommentView" class="navbar-brand col"> Modérer commentaires </a> 
                            </div>
                        </div>';
            }
        }
        ?>
        </div>
    </header>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>