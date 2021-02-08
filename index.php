<?php
require('controller/frontend.php');
session_start();
try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        } elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_SESSION['idUser']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_SESSION['idUser'], $_POST['comment']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis triple buse!');
                }
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] == 'inscriptionView') {         //go to inscription view 
            inscriptionView();
        } elseif ($_GET['action'] == 'inscriptionViewPost') {
            if (!empty($_POST['pseudo']) && !empty($_POST['pass']) && !empty($_POST['mail'])) {
                if ($_POST['pass'] === $_POST['passCheck']) {
                    addUser($_POST['pseudo'], $_POST['pass'], $_POST['mail']);
                    listPosts();
                } else {
                    echo 'les deux mots de passe ne sont pas indentiques <a href="index.php?action=inscriptionView"> retour ici </a>';
                }
            } else {
                echo 'Il faut remplir les <strong>TOUS</strong>  champs corespondant a l\'inscription <a href="index.php?action=inscriptionView"> retour ici </a> ';
            }
        } elseif ($_GET['action'] == 'connectionView') {    //clic on connection button
            connectionView();
        } elseif ($_GET['action'] == 'connectionViewPost') {           //come from connectionView with data in $_POST
            if (!empty($_POST['pseudo']) && !empty($_POST['pass'])) {
                connectUser($_POST['pseudo'], $_POST['pass']);
            } else {
                echo 'il faut remplir les champs d\'identification<a href="index.php?action=connectionView"> retour ici </a> !';
            }
        } elseif ($_GET['action'] == 'disconect') {
            session_destroy();
            listPosts();
        } elseif ($_GET['action'] == 'writePostView') {
            writePost();
        } elseif ($_GET['action'] == 'writeNewPost') {
            sendPost($_POST['newTitle'], $_POST['newPost']);
            listPosts();
        } elseif ($_GET['action'] == 'updatePost') {
            updatePost();                                       //require('view/frontend/updatePostView.php');
        } elseif ($_GET['action'] == 'getContent') {
            postContent($_GET['id']);                               // require('view/frontend/postContent');
        } elseif ($_GET['action'] == 'deletContent') {
            deletContent($_GET['id']);
        } 
        elseif ($_GET['action'] == 'newContent') {
            updateContent($_POST['newContent'], $_POST['newTitle'], $_POST['postId']);
        } elseif ($_GET['action'] == 'warnComment') {
            warnComment($_GET['id']);
        } elseif ($_GET['action'] == 'warnedCommentView') {
            getWarnedCommentVIew();
        } elseif ($_GET['action'] == 'deletComment') {
            deletComment($_GET['idComment']);
        } elseif ($_GET['action'] == 'removeWarned') {
            removeWarned($_GET['idComment']);
        }
    } else {
        listPosts();
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
