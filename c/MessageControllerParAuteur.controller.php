<?php
require_once "m/MessageManager.class.php";

class MessageControllerParAuteur{
    private $messageManager;

    public function __construct(){
        $this->messageManager = new MessageManager;
        $this->messageManager->chargementMessagesParAuteur();
    }

    public function afficherMessages(){
        $messages = $this->messageManager->getMessages();
        require "v/messagesParAuteur.view.php";
    }
}