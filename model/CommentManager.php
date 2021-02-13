<?php
require_once("model/Manager.php");

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT C.id, C.idAuthor, C.comment, U.pseudo, DATE_FORMAT(C.comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr 
        FROM comments AS C LEFT JOIN users AS U ON C.idAuthor = U.id
        WHERE post_id = ? ORDER BY C.comment_date DESC');
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

    public function removeSignal($CommentId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('UPDATE comments SET warned = 0 WHERE id = :commentId ');

        $affectedLines = $comments->execute(array(
            'commentId' => $CommentId,
        ));
        return $affectedLines;
    }

    public function getCommentsWarned()
    {
        $db = $this->dbConnect();
        $commentsWarned = $db->query('SELECT id, comment FROM comments  WHERE warned = 1 ORDER BY comment_date ASC');
        $comments = $commentsWarned->fetchAll();


        return $comments;
    }

    public function erazComment($idComment)
    {
        $db = $this->dbConnect();
        $commentToDelet = $db->prepare('DELETE FROM comments WHERE id = :idComment ');

        $affectedLines = $commentToDelet->execute(array(
            'idComment' => $idComment
        ));
        return $affectedLines;
    }
}
