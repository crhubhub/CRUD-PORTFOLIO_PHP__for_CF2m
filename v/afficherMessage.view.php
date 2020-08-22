<?php 
ob_start(); 
?>

<div class="row">
    <div class="col-6">
        <p>Titre : <?= $message->getTitre(); ?></p>
        <p>Auteur : <?= $message->getAuteur(); ?></p>
        <p>Email : <?= $message->getEmail(); ?></p>
        <p>Communication : <?= $message->getCmn(); ?></p>
    </div>
</div>

<?php
$content = ob_get_clean();
$titre = $message->getTitre();
require "template.php";
?>