<?php
require_once("model/Manager.php"); 

class UserManager extends Manager
{
    public function addUser($pseudo, $pass, $mail)
    {
        
        $db = $this->dbConnect();
        $pseudoCheck = $db->query('SELECT pseudo INTO users');

        $pseudoAvailiable = $pseudoCheck->fetch('pseudo');

        if ($pseudoAvailiable == $pseudo){
            echo "nope ce pseudo est pris";
        }
        else{
            $req = $db->prepare('INSERT INTO users(pseudo, pass, mail, since) VALUES(?, ?, ?, NOW())');
            $affectedLines = $req->execute(array($pseudo, $pass, $mail));
            return $req;
        }
    }

    public function connectUser($pseudo, $pass)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT pseudo, pass FROM users WHERE pseudo = ?, pass =?');
        $req->execute(array($pseudo, $pass));

        return $req;
    }
}