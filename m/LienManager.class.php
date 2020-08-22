<?php
require_once "Model.class.php";
require_once "Lien.class.php";

class LienManager extends Model
{
    private $liens;//tableau de Liens

    public function ajoutLien($lien)
    {
        $this->liens[] = $lien;
    }

    public function getLiens()
    {
        return $this->liens;
    }

    public function chargementLiens()
    {
        $req = $this->getBdd()->prepare("SELECT * FROM link");
        $req->execute();
        $mesLiens = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach ($mesLiens as $lien) {
            $p = new Lien($lien['id'], $lien['titre'], $lien['ad'], $lien['des']);
            $this->ajoutLien($p);
        }
    }

    public function getLienById($id)
    {
        for ($i = 0; $i < count($this->liens); $i++) {
            if ($this->liens[$i]->getId() === $id) {
                return $this->liens[$i];
            }
        }
        throw new Exception("Le lien n'existe pas");

    }

    public function ajoutLienBd($titre, $ad, $des)
    {
        $req = "
        INSERT INTO link (titre, ad, des)
        values (:titre, :ad, :des)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":titre", $titre, PDO::PARAM_STR);
        $stmt->bindValue(":ad", $ad, PDO::PARAM_STR);
        $stmt->bindValue(":des", $des, PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if ($resultat > 0) {
            $lien = new Lien($this->getBdd()->lastInsertId(), $titre, $ad, $des);
            $this->ajoutLien($lien);
        }
    }

    public function suppressionLienBD($id)
    {
        $req = "
        Delete from link where id = :idLien
        ";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idLien", $id, PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if ($resultat > 0) {
            $lien = $this->getLienById($id);
            unset($lien);
        }
    }

    public function modificationLienBD($id, $titre, $ad, $des)
    {
        $req = "update link set titre = :titre, ad = :ad, des = :des where id = :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->bindValue(":titre", $titre, PDO::PARAM_STR);
        $stmt->bindValue(":ad", $ad, PDO::PARAM_STR);
        $stmt->bindValue(":des", $des, PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if ($resultat > 0) {
            $this->getLienById($id)->setTitre($titre);
            $this->getLienById($id)->setAd($ad);
            $this->getLienById($id)->setDes($des);
        }
    }
}