<?php
require_once("model/Manager.php"); 

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, idAuthor, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function postComment($postId, $idUser, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, idAuthor, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $idUser, $comment));

        return $affectedLines;
    }

    public function signalComment($CommentId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('UPDATE comments SET warned = 1 WHERE id = :commentId ');

        $affectedLines = $comments->execute(array(
            'commentId' => $CommentId,
            ));
        return $affectedLines;
    }

    public function getWarnedCommentsList()
    {

        $db = $this->dbConnect();
        $comments = $db->query('SELECT id, comment FROM comments WHERE warned = 1 ORDER BY comment_date DESC');

        $commentList  = $comments->fetch();
        var_dump($commentList) ;

        return $commentList;
    }
}