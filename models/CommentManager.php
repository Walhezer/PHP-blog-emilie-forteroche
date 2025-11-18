<?php

/**
 * Cette classe sert à gérer les commentaires. 
 */
class CommentManager extends AbstractEntityManager
{
    /**
     * Récupère tous les commentaires d'un article.
     * @param int $idArticle : l'id de l'article.
     * @return array : un tableau d'objets Comment.
     */
    public function getAllCommentsByArticleId(int $idArticle) : array
    {
        $sql = "SELECT * FROM comment WHERE id_article = :idArticle";
        $result = $this->db->query($sql, ['idArticle' => $idArticle]);
        $comments = [];

        while ($comment = $result->fetch()) {
            $comments[] = new Comment($comment);
        }
        return $comments;
    }

    /**
     * Récupère un commentaire par son id.
     * @param int $id : l'id du commentaire.
     * @return Comment|null : un objet Comment ou null si le commentaire n'existe pas.
     */
    public function getCommentById(int $id) : ?Comment
    {
        $sql = "SELECT * FROM comment WHERE id = :id";
        $result = $this->db->query($sql, ['id' => $id]);
        $comment = $result->fetch();
        if ($comment) {
            return new Comment($comment);
        }
        return null;
    }
    /**
     * Réccupère tous les commentaires 
     * @return array
     */
    public function getAllComments() : array
{
    $sql = "
        SELECT c.id, c.pseudo, c.content, c.date_creation, a.title
        FROM comment AS c
        INNER JOIN article AS a ON c.id_article = a.id
        ORDER BY c.date_creation DESC
    ";

    $result = $this->db->query($sql);

    $comments = [];
    while ($comment = $result->fetch()) {
        $comments[] = $comment;
    }

    return $comments;
}

    /**
     * Ajoute un commentaire.
     * @param Comment $comment : l'objet Comment à ajouter.
     * @return bool : true si l'ajout a réussi, false sinon.
     */
    public function addComment(Comment $comment) : bool
    {
        $sql = "INSERT INTO comment (pseudo, content, id_article, date_creation) VALUES (:pseudo, :content, :idArticle, NOW())";
        $result = $this->db->query($sql, [
            'pseudo' => $comment->getPseudo(),
            'content' => $comment->getContent(),
            'idArticle' => $comment->getIdArticle()
        ]);
        return $result->rowCount() > 0;
    }

    /**
     * Supprime un commentaire.
     * @param Comment $comment : l'objet Comment à supprimer.
     * @return bool : true si la suppression a réussi, false sinon.
     */
    public function deleteComment(int $id) : bool
    {
        $sql = "DELETE FROM comment WHERE id = :id";
        $result = $this->db->query($sql, ['id' => $id]);
        return $result->rowCount() > 0;
    }

    public function countAllComments(): int 
    {
        $sql = "SELECT COUNT(*) as total FROM comment";
        return (int) $this->db->query($sql)->fetch()['total'];
    }

    public function getAllCommentsWithLimit(int $Limit, int $offset): array
    {
        $sql = "SELECT c.*, a.title AS title
                FROM comment c
                JOIN article a ON a.id = c.id_article
                ORDER BY c.date_creation DESC
                LIMIT $Limit OFFSET $offset";
        
        $result = $this->db->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

}
