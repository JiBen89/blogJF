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
    $author = $_SESSION['pseudo'];

    $affectedLines = $commentManager->postComment($postId, $author , $comment);

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
function connectUser($pseudo, $pass)
{
    $connectUser = new UserManager();
    $userData = $connectUser->getUser($pseudo);
    if (!empty($userData)){
        $isPasswordCorrect = password_verify($pass, $userData['pass']);
        if ($isPasswordCorrect){
            session_start();
            $_SESSION['id'] = $userData['id'];
            $_SESSION['pseudo'] = $userData['pseudo'];
            $_SESSION['adm'] = $userData['adm'];
            header('Location: index.php' );
        }
    }
        else {
            echo 'Mauvais mot de passe !';
        }
}
function inscriptionView(){
    require("view/frontend/inscriptionView.php");
}

function connectionView(){
    require('view/frontend/connectionView.php');
}
function writePost(){
    require('view/frontend/writePostView.php');
}
function sendPost($newTitle, $newPost)
{
    $postManager = new PostManager();

    $affectedLines = $postManager->sendPost($newTitle, $newPost);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le post');
    }
    else {
        header('Location: index.php?');
    }
}

