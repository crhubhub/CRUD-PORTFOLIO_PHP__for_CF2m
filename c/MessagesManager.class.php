<?php
require_once "m/Model.class.php";
require_once "c/Message.class.php";

class MessagesManager extends Model
{
    private $messages;

    public function addMessage($message)
    {
        $this->messages[] = $message;
    }

    /**
     * @return mixed
     */
    public function getMessages()
    {
        return $this->messages;
    }

    public function loadMessages()
    {
        $req = $this->getBdd()->prepare("SELECT * FROM message ORDER BY date DESC");
        $req->execute();
        $messages = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach ($messages as $message) {
            $p = new Message($message['id'], $message['name'], $message['email'], $message['phone'], $message['message_txt'], $message['date'], $message['archived']);
            $this->addMessage($p);
        }
    }

}