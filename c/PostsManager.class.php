<?php
require_once "m/Model.class.php";
require_once "c/Post.class.php";


//Cet objet discute avec la bdd (via model)
//-> queries
class PostsManager extends Model
{
    private $posts;

    public function addPost($post)
    {
        $this->posts[] = $post;
    }

    /**
     * @return mixed
     */
    public function getPosts()
    {
        return $this->posts;
    }

//    réviser tout ça
    public function loadPosts()
    {
        $req = $this->getBdd()->prepare("SELECT * FROM post ORDER BY date DESC");
        $req->execute();

//        sinon affichage en print_r de clé_val ET par index, doublon
        $posts = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach ($posts as $post) {
            $p = new Post($post['id'], $post['title'], $post['image'], $post['date']);
            $this->addPost($p);
        }
    }


}