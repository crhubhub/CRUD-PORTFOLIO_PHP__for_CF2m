<?php

class Message
{
    private $id;
    private $titre;
    private $auteur;
    private $email;
    private $cmn;
    private $date;

    public function __construct($id, $titre, $auteur, $email, $cmn, $date)
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->auteur = $auteur;
        $this->email = $email;
        $this->cmn = $cmn;
        $this->date = $date;
    }
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }





    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }


    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }


    /**
     * @param mixed $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * @return mixed
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * @param mixed $auteur
     */
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getCmn()
    {
        return $this->cmn;
    }

    /**
     * @param mixed $cmn
     */
    public function setCmn($cmn)
    {
        $this->cmn = $cmn;
    }


    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }


}