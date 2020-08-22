<?php
require_once "m/MessageManager.class.php";

class MessageController{
    private $messageManager;

    public function __construct(){
        $this->messageManager = new MessageManager;
        $this->messageManager->chargementMessages();
    }

    public function afficherMessages(){
        $messages = $this->messageManager->getMessages();
        require "v/messages.view.php";
    }

    public function afficherMessage($id){
        $message = $this->messageManager->getMessageById($id);
        require "v/afficherMessage.view.php";
    }

    public function ajoutMessage(){
        require "v/ajoutMessage.view.php";
    }

    public function ajoutMessageValidation(){
        $this->messageManager->ajoutMessageBd($_POST['titre'],$_POST['auteur'],$_POST['email'],
            $_POST['cmn']);
        
        $_SESSION['alert'] = [
            "type" => "success",
            "msg" => "Nouveau Message"
        ];
        
        header('Location: '. URL . "accueil");
    }

    public function suppressionMessage($id){
        $this->messageManager->suppressionMessageBD($id);
        $_SESSION['alert'] = [
            "type" => "success",
            "msg" => "Suppression Réalisée"
        ];
        header('Location: '. URL . "messages");
    }

}