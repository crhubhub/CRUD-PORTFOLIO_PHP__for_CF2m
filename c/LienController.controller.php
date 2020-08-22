<?php
require_once "m/LienManager.class.php";

class LienController
{
    private $lienManager;

    public function __construct()
    {
        $this->lienManager = new LienManager;
        $this->lienManager->chargementLiens();
    }

    public function afficherLiens()
    {
        $liens = $this->lienManager->getLiens();
        require "v/liens.view.php";
    }

    public function afficherLiensPublic()
    {
        $liens = $this->lienManager->getLiens();
        require "v/liens-public.view.php";
    }

    public function afficherLien($id)
    {
        $lien = $this->lienManager->getLienById($id);
        require "v/afficherLien.view.php";
    }


    public function ajoutLien()
    {
        require "v/ajoutLien.view.php";
    }

    public function ajoutLienValidation()
    {
        $this->lienManager->ajoutLienBd($_POST['titre'], $_POST['ad'], $_POST['des']);

        $_SESSION['alert'] = [
            "type" => "success",
            "msg" => "Ajout Réalisé"
        ];

        header('Location: ' . URL . "liens");
    }

    public function suppressionLien($id)
    {
        $this->lienManager->suppressionLienBD($id);
        $_SESSION['alert'] = [
            "type" => "success",
            "msg" => "Suppression Réalisée"
        ];
        header('Location: ' . URL . "liens");
    }

    public function modificationLien($id)
    {
        $lien = $this->lienManager->getLienById($id);
        require "v/modifierLien.view.php";
    }


    public function modificationLienValidation()
    {
        $this->lienManager->modificationLienBD($_POST['id'], $_POST['titre'], $_POST['ad'],
            $_POST['des']);


        $_SESSION['alert'] = [
            "type" => "success",
            "msg" => "modification Réalisée"
        ];

        header('Location: ' . URL . "liens");
    }


}













