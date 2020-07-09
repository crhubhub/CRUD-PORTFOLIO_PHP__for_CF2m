<?php
require_once "c/MessagesManager.class.php";

class MessagesController
{

    private $messagesManager;

    public function __construct()
    {
        $this->messagesManager = new MessagesManager();
        $this->messagesManager->loadMessages();
    }

    public function showMessages()
    {
        $messagesArray = $this->messagesManager->getMessages();
        require "v/messages-admin.view.php";
    }
    public function showArchivedMessages()
    {
        $messagesArray = $this->messagesManager->getMessages();
        require "v/archived-messages-admin.view.php";
    }

}