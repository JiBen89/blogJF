<?php
require('controller/frontend.php');
if(!empty($_SESSION['pseudo']))
{
    echo 'Bonjour ' . $_SESSION['pseudo'].'<a href="index.php?action=disconect" > deconexion </a>'; 
}
try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'addComment') {
            session_start();
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_SESSION['pseudo']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_SESSION['pseudo'], $_POST['comment']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'inscriptionView') {         //go to inscription view 
            inscriptionView();
        }
        elseif ($_GET['action'] == 'inscriptionViewPost'){
            if (!empty($_POST['pseudo']) && !empty($_POST['pass']) && !empty($_POST['mail']))
            {
                if($_POST['pass'] === $_POST['passCheck']){
                addUser($_POST['pseudo'], $_POST['pass'], $_POST['mail']);
                listPosts();
                }
                else{
                    echo 'les deux mots de passe ne sont pas indentiques <a href="index.php?action=inscriptionView"> retour ici </a>';
                }
            }
            else {
                echo 'Il faut remplir les <strong>TOUS</strong>  champs corespondant a l\'inscription <a href="index.php?action=inscriptionView"> retour ici </a> ' ;
            }
        }
        elseif ($_GET['action'] == 'connectionView') {    //clic on connection button
            connectionView();
        }
        elseif ($_GET['action'] == 'connectionViewPost') {           //come from connectionView with data in $_POST
            if(!empty($_POST['pseudo']) && !empty($_POST['pass']))
            {
               connectUser($_POST['pseudo'], $_POST['pass']);
            }
            else {
                echo 'il faut remplir les champs d\'identification<a href="index.php?action=connectionView"> retour ici </a> !';
            }
        }
        elseif ($_GET['action'] == 'disconect'){
            session_start();
            session_destroy();
            listPosts();
        }
        elseif ($_GET['action'] == 'writePostView'){
            writePost();
        }
        elseif($_GET['action'] == 'writeNewPost'){
            sendPost($_POST['newTitle'], $_POST['newPost']);
            listPosts();
        }
    }
    else {
        listPosts();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}