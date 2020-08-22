<?php
require_once "m/PostManager.class.php";

class PostController
{
    private $postManager;

    public function __construct()
    {
        $this->postManager = new PostManager;
        $this->postManager->chargementPosts();
    }

    public function afficherPosts()
    {
        $posts = $this->postManager->getPosts();
        require "v/posts.view.php";
    }

    public function afficherPostsPublic()
    {
        $posts = $this->postManager->getPosts();
        require "v/posts-public.view.php";
    }

    public function afficherPost($id)
    {
        $post = $this->postManager->getPostById($id);
        require "v/afficherPost.view.php";
    }

    public function ajoutPost()
    {
        require "v/ajoutPost.view.php";
    }

    public function ajoutPostValidation()
    {
        $file = $_FILES['image'];
        $repertoire = "public/images/";
        $nomImageAjoute = $this->ajoutImage($file, $repertoire);


        $this->postManager->ajoutPostBd($_POST['titre'], $_POST['auteur'], $nomImageAjoute);

        $_SESSION['alert'] = [
            "type" => "success",
            "msg" => "Ajout Réalisé"
        ];

        header('Location: ' . URL . "galerie");
    }

    public function suppressionPost($id)
    {
        $nomImage = $this->postManager->getPostById($id)->getImage();
        unlink("public/images/" . $nomImage);
        $this->postManager->suppressionPostBD($id);
        $_SESSION['alert'] = [
            "type" => "success",
            "msg" => "Suppression Réalisée"
        ];
        header('Location: ' . URL . "galerie");
    }

    public function modificationPost($id)
    {
        $post = $this->postManager->getPostById($id);
        require "v/modifierPost.view.php";
    }

    public function modificationPostValidation()
    {
        $imageActuelle = $this->postManager->getPostById($_POST['identifiant'])->getImage();
        $file = $_FILES['image'];

        if ($file['size'] > 0) {
            unlink("public/images/" . $imageActuelle);
            $repertoire = "public/images/";
            $nomImageToAdd = $this->ajoutImage($file, $repertoire);
        } else {
            $nomImageToAdd = $imageActuelle;
        }
        $this->postManager->modificationPostBD($_POST['identifiant'], $_POST['titre'], $_POST['auteur'], $nomImageToAdd);


        $_SESSION['alert'] = [
            "type" => "success",
            "msg" => "modification Réalisée"
        ];

        header('Location: ' . URL . "galerie");
    }

    private function ajoutImage($file, $dir)
    {
        if (!isset($file['name']) || empty($file['name']))
            throw new Exception("Vous devez indiquer une image");

        if (!file_exists($dir)) mkdir($dir, 0777);

        $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $random = rand(0, 99999);
        $target_file = $dir . $random . "_" . $file['name'];

        if (!getimagesize($file["tmp_name"]))
            throw new Exception("Le fichier n'est pas une image");
        if ($extension !== "jpg" && $extension !== "jpeg" && $extension !== "png" && $extension !== "gif")
            throw new Exception("L'extension du fichier n'est pas reconnu");
        if (file_exists($target_file))
            throw new Exception("Le fichier existe déjà");
        if ($file['size'] > 2000000)
            throw new Exception("Le fichier est trop gros");
        if (!move_uploaded_file($file['tmp_name'], $target_file))
            throw new Exception("l'ajout de l'image n'a pas fonctionné");
        else return ($random . "_" . $file['name']);
    }
}