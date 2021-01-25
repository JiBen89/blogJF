<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');

function listPosts()
{
    $postManager = new PostManager(); // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

    require('view/frontend/listPostsView.php');
}

function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment)
{
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function pseudoAvailiable($pseudo)
{
    $userManager = new UserManager();

    $userExist = $userManager->checkUser($pseudo);

    return $userExist;
}

function addUser($pseudo, $pass, $mail)
{
    $hashed = password_hash($pass, PASSWORD_DEFAULT);
    $pseudoExist = pseudoAvailiable($pseudo);
    $error = true;
    $userManager = new UserManager();
    if ($pseudoExist === false){

        $affectedLines = $userManager->addUser($pseudo, $hashed, $mail);
    
        if ($affectedLines === false) {
            $error = true;
        }
    }
    else{
        throw new Exception('le pseudo est déjà utilisé <a href="index.php?action=inscriptionView"> retour ici </a>!');
    }
    if (!$error){
        header('Location: index.php' );
    }
}
function inscriptionView(){
    require("view/frontend/inscriptionView.php");
}

function connection($pseudo, $pass){
    $hashed = password_hash($pass, PASSWORD_DEFAULT);
}

function connectionView(){
    require("view/frontend/connectionView.php");
}
