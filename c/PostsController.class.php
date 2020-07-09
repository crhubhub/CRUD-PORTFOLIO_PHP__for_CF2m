<?php
require_once "c/PostsManager.class.php";


// Cet objet demande au manager le chargement des livres et n'échange donc pas directement
// avec la bdd, -> instructions de chargement simplifiées et ensuite demande d'affichage

//réviser ?

class PostsController
{

    private $postsManager;

    public function __construct()
    {
        $this->postsManager = new PostsManager();
        $this->postsManager->loadPosts();
    }

    public function showGallery()
    {
        $postsArray = $this->postsManager->getPosts();
        require "v/gallery.view.php";
    }
    public function showGalleryAdmin()
    {
        $postsArray = $this->postsManager->getPosts();
        require "v/gallery-admin.view.php";
    }

}