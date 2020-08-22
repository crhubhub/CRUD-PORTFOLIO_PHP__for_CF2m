<?php

class Lien
{
    private $id;
    private $titre;
    private $ad;
    private $des;

    public function __construct($id, $titre, $ad, $des)
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->ad = $ad;
        $this->des = $des;
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
     * @param mixed $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * @return mixed
     */
    public function getAd()
    {
        return $this->ad;
    }

    /**
     * @param mixed $ad
     */
    public function setAd($ad)
    {
        $this->ad = $ad;
    }

    /**
     * @return mixed
     */
    public function getDes()
    {
        return $this->des;
    }

    /**
     * @param mixed $des
     */
    public function setDes($des)
    {
        $this->des = $des;
    }

}
