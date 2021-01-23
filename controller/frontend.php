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

function addUser($pseudo, $pass, $mail)
{
    $userManager = new UserManager();

    $affectedLines = $userManager->addUser($pseudo, $pass, $mail);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter l\'utilisateur !');
    }
    else {
        header('Location: index.php' );
    }

}
function inscriptionView(){
    require("view/frontend/inscriptionView.php");
}

function connection($pseudo, $pass){

}

function connectionView(){
    require("view/frontend/connectionView.php");
}
