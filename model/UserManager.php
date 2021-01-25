<?php
require_once("model/Manager.php"); 

class UserManager extends Manager
{

    /**
     * add a user to the database
     *
     * @param string $pseudo
     * @param string $pass
     * @param string $mail
     * @return req
     */
    public function addUser($pseudo, $pass, $mail)
    { 
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO users(pseudo, pass, mail, since) VALUES(?, ?, ?, NOW())');
        $affectedLines = $req->execute(array($pseudo, $pass, $mail));
        
        return $req;
        
    }
    /**
     * connect the user the sessions start
     *
     * @param [type] $pseudo
     * @param [type] $pass
     * @return req
     */
    public function connectUser($pseudo, $pass)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT pseudo, pass FROM users WHERE pseudo = ?, pass =?');
        $req->execute(array($pseudo, $pass));

        return $req;
    }

    /**
     * check if $pseudo exist in the DB
     *
     * @param string $pseudo
     * @return bool
     */
    public function checkUser($pseudo)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM users WHERE pseudo = ?');
        $req->execute(array($pseudo));
        $result = ($req->rowCount() > 0 );

        return $result;
    }
}