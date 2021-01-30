<?php
require_once("model/Manager.php"); 

class PostManager extends Manager
{
    /**
     * get all the posts
     *
     * @return $req
     */
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

        return $req;
    }

    public function sendPost($newTitle, $newPost)
    {
        $db = $this->dbConnect();
        $theNewPost = $db->prepare('INSERT INTO posts( title, content, creation_date) VALUES(?, ?, NOW())');
        $theNewPost->execute(array($newTitle, $newPost));
        var_dump($newTitle);
        
        return $theNewPost;
    }

/**
 * get the post from the ID
 *
 * @param number $postId
 * @return void
 */
    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        
        $post = $req->fetch();

        return $post;
    }
}