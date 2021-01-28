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

    /**
     * connect the user the sessions start
     *
     * @param [type] $pseudo
     * @param [type] $pass
     * @return result
     */
    public function getUser($pseudo)
    {
        $db = $this->dbConnect();                                                   // connect to the database
        $req = $db->prepare('SELECT id, pseudo, pass FROM users WHERE pseudo = ?'); // we get the data for the user conection with the pseudo
        $req->execute(array($pseudo));                                              // we the collected data id, pseudo & pass in $req
            $result = $req->fetch();                                        

            return $result;
    }
}