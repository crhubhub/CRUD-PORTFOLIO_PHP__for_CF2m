<?php 
ob_start(); 
?>

<form method="POST" action="<?= URL ?>liens/mv" enctype="multipart/form-data">
    <div class="form-group">
        <label for="titre">Titre : </label>
        <input type="text" class="form-control" id="titre" name="titre" value="<?=
        $lien->getTitre() ?>">
    </div>
    <div class="form-group">
        <label for="ad">URL complète : </label>
        <input type="text" class="form-control" id="ad" name="ad" value="<?=
        $lien->getAd() ?>">
    </div>
    <div class="form-group">
        <label for="des">Description : </label>
        <input type="text" class="form-control" id="des" name="des" value="<?=
        $lien->getDes() ?>">
    </div>

    <input type="hidden" name="identifiant" value="<?= $lien->getId(); ?>">
    <button type="submit" class="btn btn-primary">Valider</button>
</form>

<?php
$content = ob_get_clean();
$titre = "Modification du lien : ".$lien->getId();
require "template.php";
?>