<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');

function listPosts()
{
    $postManager = new PostManager();
    $posts = $postManager->getPosts();
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

function addComment($postId, $idUser, $comment)
{
    $commentManager = new CommentManager();
    $author = $_SESSION['pseudo'];

    $affectedLines = $commentManager->postComment($postId, $idUser , $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}
function deletComment($idComment)
{
    $commentManager = new CommentManager();
    $affectedLines = $commentManager->erazComment($idComment);

    if ($affectedLines === false) {
        throw new Exception('Impossible de supprimer le commentaire !');
    }
    else {
        header("Location: index.php?action=warnedCommentView");
    }
}

function warnComment($CommentId)
{
    $commentManager = new CommentManager();
    $affectedLines = $commentManager->signalComment($CommentId);

    if ($affectedLines === false) {
        throw new Exception('Impossible de signaler le commentaire '. $CommentId  );
    }
    else{
        header("Location: index.php");
    }
}

function removeWarned($CommentId)
{
    $commentManager = new CommentManager();
    $affectedLines = $commentManager->removeSignal($CommentId);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'enlever le signalement du commentaire '. $CommentId  );
    }
    else {
        header("Location: index.php?action=warnedCommentView");
    }
}

function getWarnedCommentView()
{
    $commentManager = new CommentManager();
    $comments = $commentManager->getCommentsWarned();

    require("view/frontend/warnedCommentView.php");
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
            $_SESSION['idUser'] = $userData['id'];
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

function updatePost()
{
    $postManager = new PostManager(); 
    $posts = $postManager->getPostsList(); 

    require('view/frontend/updatePostView.php');
}
function deletContent($postId)
{
    $postManager = new PostManager();
    $deletPost = $postManager->deletPost($postId);

    header('Location: index.php?action=updatePost');
}

function postContent()
{
    $postManager = new PostManager();
    $content = $postManager->getPostContent($_GET['id']);
    require('view/frontend/postContent.php');
}

function updateContent($newContent, $newTitle, $postId)
{
    $postManager = new PostManager(); 
    $affectedLines = $postManager->modifyContent($postId, $newContent, $newTitle); 

    if ($affectedLines === false) {
        throw new Exception('Impossible de modifier le post');
    }
    else {
        header('Location: index.php?');
    }
}
function getBioView(){
    require("view/frontend/bioAuthoView.php");
}
function allPosts(){
    $postManager = new PostManager();
    $posts = $postManager->getAllPosts();

    require("view/frontend/allPostsView.php");
}



