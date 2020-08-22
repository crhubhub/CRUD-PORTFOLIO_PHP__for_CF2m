<?php 
ob_start(); 
?>

<div class="row">
    <div class="col-6">
        <img alt="" src="<?= URL ?>public/images/<?= $post->getImage(); ?>">
    </div>
    <div class="col-6">
        <p>Titre : <?= $post->getTitre(); ?></p>
        <p>Nombre de pages : <?= $post->getAuteur(); ?></p>
    </div>
</div>

<?php
$content = ob_get_clean();
$titre = $post->getTitre();
require "template.php";
?>