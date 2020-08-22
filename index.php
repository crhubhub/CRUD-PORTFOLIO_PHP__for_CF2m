<?php
session_start();

define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") .
    "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

require_once "c/PostController.controller.php";
$postController = new PostController;
require_once "c/LienController.controller.php";
$lienController = new LienController;
require_once "c/MessageController.controller.php";
$messageController = new MessageController;
require_once "c/MessageControllerParAuteur.controller.php";
$messageControllerParAuteur = new MessageControllerParAuteur;

try {
    if (empty($_GET['page'])) {
        require "v/accueil.view.php";
    } else {
        $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);

        switch ($url[0]) {
            case "accueil" :
                require "v/accueil.view.php";
                break;
            case "tuto-partage" :
                require "v/tuto-partage.view.php";
                break;
            case "admin-connect" :
                require "v/admin-connect.view.php";
                break;
            case "tuto-cree" :
                require "v/tuto-cree.view.php";
                break;
            case "galerie-public" :
                $postController->afficherPostsPublic();
                break;
            case "liens-public" :
                $lienController->afficherLiensPublic();
                break;

            case "galerie" :
                if ($url[1] === "l") {
                    $postController->afficherPost($url[2]);
                } else if (!isset($_SESSION['connect']) || ($_SESSION['connect'] !=
                        1)) {
                    throw new
                    Exception("La page n'existe pas");
                } else if (empty($url[1])) {
                    $postController->afficherPosts();
                } else if ($url[1] === "a") {
                    $postController->ajoutPost();
                } else if ($url[1] === "m") {
                    $postController->modificationPost($url[2]);
                } else if ($url[1] === "s") {
                    $postController->suppressionPost($url[2]);
                } else if ($url[1] === "av") {
                    $postController->ajoutPostValidation();
                } else if ($url[1] === "mv") {
                    $postController->modificationPostValidation();
                } else {
                    throw new Exception("La page n'existe pas");
                }
                break;
            case
            "liens" :
                if ($url[1] === "l") {
                    $lienController->afficherLien($url[2]);
                } else if (!isset($_SESSION['connect']) || ($_SESSION['connect'] !=
                        1)) {
                    throw new
                    Exception("La page n'existe pas");
                } else if (empty($url[1])) {
                    $lienController->afficherLiens();
                } else if ($url[1] === "a") {
                    $lienController->ajoutLien();
                } else if ($url[1] === "m") {
                    $lienController->modificationLien($url[2]);
                } else if ($url[1] === "s") {
                    $lienController->suppressionLien($url[2]);
                } else if ($url[1] === "av") {
                    $lienController->ajoutLienValidation();
                } else if ($url[1] === "mv") {
                    $lienController->modificationLienValidation();
                } else {
                    throw new Exception("La page n'existe pas");
                }
                break;

            case "mpa" :
                if ($_SESSION['connect'] === 1) {
                    $messageControllerParAuteur->afficherMessages();
                } else {
                    throw new Exception("La page n'existe pas");
                }
                break;

            case
            "messages" :
                if ($url[1] === "a") {
                    $messageController->ajoutMessage();
                } else if ($url[1] === "av") {
                    $messageController->ajoutMessageValidation();
                } else if (!isset($_SESSION['connect']) || ($_SESSION['connect'] !=
                        1)) {
                    throw new Exception("La page n'existe pas");
                } elseif (empty($url[1])) {
                    $messageController->afficherMessages();
                } else if ($url[1] === "l") {
                    $messageController->afficherMessage($url[2]);
                } else if ($url[1] === "s") {
                    $messageController->suppressionMessage($url[2]);
                } else {
                    throw new Exception("La page n'existe pas");
                }
                break;
            default :
                throw new Exception("La page n'existe pas");
        }
    }
} catch
(Exception $e) {
    $msg = $e->getMessage();
    require "v/error.view.php";
}
