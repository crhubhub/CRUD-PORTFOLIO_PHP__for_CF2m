<?php
require_once "Model.class.php";
require_once "Message.class.php";

class MessageManager extends Model
{

    private $messages;//tableau de Messagess

    public function ajoutMessage($message)
    {
        $this->messages[] = $message;
    }

    public function getMessages()
    {
        return $this->messages;
    }

    public function chargementMessages()
    {
        $req = $this->getBdd()->prepare("SELECT * FROM message ORDER BY date desc");
        $req->execute();
        $mesMessages = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach ($mesMessages as $message) {
            $p = new Message($message['id'], $message['titre'], $message['auteur'],
                $message['email'], $message['cmn']);
            $this->ajoutMessage($p);
        }
    }

    public function chargementMessagesParAuteur()
    {
        $req = $this->getBdd()->prepare("SELECT * FROM message ORDER BY auteur");
        $req->execute();
        $mesMessages = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach ($mesMessages as $message) {
            $p = new Message($message['id'], $message['titre'], $message['auteur'],
                $message['email'], $message['cmn']);
            $this->ajoutMessage($p);
        }
    }

    public function getMessageById($id)
    {
        for ($i = 0; $i < count($this->messages); $i++) {
            if ($this->messages[$i]->getId() === $id) {
                return $this->messages[$i];
            }
        }
        throw new Exception("Le message n'existe pas");
    }

    public function ajoutMessageBd($titre, $auteur, $email, $cmn)
    {
        $req = "INSERT INTO message (titre, auteur, email, cmn) values (:titre, :auteur, :email, :cmn)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":titre", $titre, PDO::PARAM_STR);
        $stmt->bindValue(":auteur", $auteur, PDO::PARAM_STR);
        $stmt->bindValue(":email", $email, PDO::PARAM_STR);
        $stmt->bindValue(":cmn", $cmn, PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if ($resultat > 0) {
            $message = new Message($this->getBdd()->lastInsertId(), $titre, $auteur, $email, $cmn);
            $this->ajoutMessage($message);
        }
    }



    public function suppressionMessageBD($id)
    {
        $req = "Delete from message where id = :idMessage";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idMessage", $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();

    }
}