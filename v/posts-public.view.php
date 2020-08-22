<?php 
ob_start(); 

if(!empty($_SESSION['alert'])) :
?>
<div class="alert alert-<?= $_SESSION['alert']['type'] ?>" role="alert">
    <?= $_SESSION['alert']['msg'] ?>
</div>
<?php 
unset($_SESSION['alert']);
endif; 
?>

<table class="table text-center">
    <tr class="table-dark">
        <th>Image</th>
        <th>Titre</th>
        <th>Auteur</th>
    </tr>
    <?php 
    for($i=0; $i < count($posts);$i++) :
    ?>
    <tr>
        <td class="align-middle"><img src="public/images/<?= $posts[$i]->getImage(); ?>"
                                      width="60px;"></td>
        <td class="align-middle"><a href="<?= URL ?>galerie/l/<?= $posts[$i]->getId(); ?>"><?=
                $posts[$i]->getTitre(); ?></a></td>
        <td class="align-middle"><?= $posts[$i]->getAuteur(); ?></td>

    </tr>
    <?php endfor; ?>
</table>
<?php
$content = ob_get_clean();
$titre = "Galerie";
require "template.php";
?>