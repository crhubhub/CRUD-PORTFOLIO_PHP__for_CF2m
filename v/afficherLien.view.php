<?php 
ob_start(); 
?>

<div class="row">

    <div class="col-6">
        <p>Titre : <?= $lien->getTitre(); ?></p>
        <p>URL : <?= $lien->getAd(); ?></p>
        <p>Description : <?= $lien->getDes(); ?></p>
    </div>
</div>

<?php
$content = ob_get_clean();
$titre = $lien->getTitre();
require "template.php";
?>