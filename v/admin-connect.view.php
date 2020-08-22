<?php
ob_start();
?>
<?php if (!isset($_SESSION['connect']) || ($_SESSION['connect'] != 1)) :?>
<form method="POST" action="<?= URL ?>accueil" enctype="multipart/form-data">
    <div class="form-group">
        <label for="username">Username : </label>
        <input type="text" class="form-control" id="username" name="username">
    </div>
    <div class="form-group">
        <label for="passwd">Password : </label>
        <input type="password" class="form-control" id="passwd" name="passwd">
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
</form>
<?php else : ?>
<h3>Vous êtes déja connecté.e !</h3>
<?php endif; ?>
<?php
$content = ob_get_clean();
$titre = "Connexion en tant qu'ADMIN";
require "template.php";
?>












<?php
//ob_start();
//?>
<!--<form method="POST" action="--><?//= URL ?><!--accueil" enctype="multipart/form-data">-->
<!--    <div class="form-group">-->
<!--        <label for="username">Username : </label>-->
<!--        <input type="text" class="form-control" id="username" name="username">-->
<!--    </div>-->
<!--    <div class="form-group">-->
<!--        <label for="passwd">Password : </label>-->
<!--        <input type="password" class="form-control" id="passwd" name="passwd">-->
<!--    </div>-->
<!--    <button type="submit" class="btn btn-primary">Valider</button>-->
<!--</form>-->
<?php
//$content = ob_get_clean();
//$titre = "Connexion en tant qu'ADMIN";
//require "template.php";
//?>
