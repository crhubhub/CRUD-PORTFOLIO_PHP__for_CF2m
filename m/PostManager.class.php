<?php
require_once "Model.class.php";
require_once "Post.class.php";

class PostManager extends Model
{
    private $posts;//tableau de Posts

    public function ajoutPost($post)
    {
        $this->posts[] = $post;
    }

    public function getPosts()
    {
        return $this->posts;
    }

    public function chargementPosts()
    {
        $req = $this->getBdd()->prepare("SELECT * FROM post ORDER BY date");
        $req->execute();
        $mesPosts = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach ($mesPosts as $post) {
            $p = new Post($post['id'], $post['titre'], $post['auteur'], $post['image']);
            $this->ajoutPost($p);
        }
    }

    public function getPostById($id)
    {
        for ($i = 0; $i < count($this->posts); $i++) {
            if ($this->posts[$i]->getId() === $id) {
                return $this->posts[$i];
            }
        }
        throw new Exception("Le post n'existe pas");
    }

    public function ajoutPostBd($titre, $auteur, $image)
    {
        $req = "
        INSERT INTO post (titre, auteur, image)
        values (:titre, :auteur, :image)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":titre", $titre, PDO::PARAM_STR);
        $stmt->bindValue(":auteur", $auteur, PDO::PARAM_STR);
        $stmt->bindValue(":image", $image, PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if ($resultat > 0) {
            $post = new Post($this->getBdd()->lastInsertId(), $titre, $auteur, $image);
            $this->ajoutPost($post);
        }
    }

    public function suppressionPostBD($id)
    {
        $req = "
        Delete from post where id = :idPost
        ";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idPost", $id, PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if ($resultat > 0) {
            $post = $this->getPostById($id);
            unset($post);
        }
    }

    public function modificationPostBD($id, $titre, $auteur, $image)
    {
        $req = "update post set titre = :titre, auteur = :auteur, image = :image where id = :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->bindValue(":titre", $titre, PDO::PARAM_STR);
        $stmt->bindValue(":auteur", $auteur, PDO::PARAM_STR);
        $stmt->bindValue(":image", $image, PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if ($resultat > 0) {
            $this->getPostById($id)->setTitre($titre);
            $this->getPostById($id)->setAuteur($auteur);
            $this->getPostById($id)->setImage($image);
        }
    }
}