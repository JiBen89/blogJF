<?php
require('controller/frontend.php');

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
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'inscriptionViewPost'){                 //reçoit les données de inscriptionViewPrePost
            if (!empty($_POST['pseudo']) && !empty($_POST['pass']) && !empty($_POST['mail']))
            {
                if($_POST['pass'] === $_POST['passCheck']){
                addUser($_POST['pseudo'], $_POST['pass'], $_POST['mail']);     // traite les données envoyés par le formulaire d'insrciption 
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
        elseif ($_GET['action'] == 'connection') {
            connection($_POST['pseudo'], $_POST['password']);
        }
        elseif ($_GET['action'] == 'connectionView') {           //Nous envoie vers la page connection view
            connectionView();
        }
        elseif ($_GET['action'] == 'inscriptionView') {         //Nous envoie vers la page inscription view 
            inscriptionView();
        }
    }
    else {
        listPosts();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}