<?php 
ob_start(); 
?>

<form method="POST" action="<?= URL ?>galerie/mv" enctype="multipart/form-data">
    <div class="form-group">
        <label for="titre">Titre : </label>
        <input type="text" class="form-control" id="titre" name="titre" value="<?=
        $post->getTitre() ?>">
    </div>
    <div class="form-group">
        <label for="auteur">Auteur : </label>
        <input type="text" class="form-control" id="auteur" name="auteur" value="<?=
        $post->getAuteur() ?>">
    </div>
    <h3>Images : </h3>
    <img alt="" src="<?= URL ?>public/images/<?= $post->getImage() ?>">
    <div class="form-group">
        <label for="image">Changer l'image : </label>
        <input type="file" class="form-control-file" id="image" name="image">
    </div>
    <input type="hidden" name="identifiant" value="<?= $post->getId(); ?>">
    <button type="submit" class="btn btn-primary">Valider</button>
</form>

<?php
$content = ob_get_clean();
$titre = "Modification du post : ".$post->getId();
require "template.php";
?>