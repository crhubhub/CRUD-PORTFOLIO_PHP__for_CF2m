<?php 
ob_start(); 
?>
<form method="POST" action="<?= URL ?>messages/av" enctype="multipart/form-data">
    <div class="form-group">
        <label for="auteur">Votre Nom : </label>
        <input type="text" class="form-control" id="auteur" name="auteur">
    </div>
    <div class="form-group">
        <label for="titre">Objet : </label>
        <input type="text" class="form-control" id="titre" name="titre">
    </div>
    <div class="form-group">
        <label for="email">Email : </label>
        <input type="text" class="form-control" id="email" name="email">
    </div>
    <div class="form-group">
        <label for="cmn">Message : </label>
        <textarea type="text" class="form-control" id="cmn" rows="5" name="cmn">
        </textarea>
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
</form>
<?php
$content = ob_get_clean();
$titre = "Envoi d'un message";
require "template.php";
?>