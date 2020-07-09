<?php
require_once "c/PostsController.class.php";
require_once "c/MessagesController.class.php";
require "c/LinksController.class.php";

$postsController = new PostsController();
$messagesController = new MessagesController();
$linksController = new LinksController();

if (empty($_GET['page'])) {
    require "v/home.view.php";
} else {
    switch ($_GET['page']) {
        case "home" :
            require "v/home.view.php";
            break;
        case "gallery" :
            $postsController->showGallery();
            break;
        case "links" :
            $linksController->showLinks();
            break;
        case "shared-tutorial" :
            require "v/shared-t.view.php";
            break;
        case "positioning-tutorial" :
            require "v/my-t.view.php";
            break;
        case "g-admin" :
            $postsController->showGalleryAdmin();
            break;
        case "l-admin" :
            $linksController->showLinksAdmin();
            break;
        case "m-admin" :
            $messagesController->showMessages();
            break;
        case "am-admin" :
            $messagesController->showArchivedMessages();
            break;
    }
}