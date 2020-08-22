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
        <th>Titre</th>
        <th>URL</th>
        <th>Description</th>
        <th colspan="2">Actions</th>
    </tr>
    <?php 
    for($i=0; $i < count($liens);$i++) :
    ?>
    <tr>
        <td class="align-middle"><a href="<?= URL ?>liens/l/<?= $liens[$i]->getId(); ?>"><?=
                $liens[$i]->getTitre(); ?></a></td>
        <td class="align-middle">
            <a href="<?= $liens[$i]->getAd(); ?>"
               target="_blank"><?= $liens[$i]->getAd(); ?></a>
        </td>
        <td class="align-middle"><?= $liens[$i]->getDes(); ?></td>
        <td class="align-middle"><a href="<?= URL ?>liens/m/<?= $liens[$i]->getId(); ?>"
                                    class="btn btn-warning">Modifier</a></td>
        <td class="align-middle">
            <form method="POST" action="<?= URL ?>liens/s/<?= $liens[$i]->getId(); ?>"
                  onSubmit="return confirm('Voulez-vous vraiment supprimer le lien ?');">
                <button class="btn btn-danger" type="submit">Supprimer</button>
            </form>
        </td>
    </tr>
    <?php endfor; ?>
</table>
<a href="<?= URL ?>liens/a" class="btn btn-success d-block">Ajouter</a>

<?php
$content = ob_get_clean();
$titre = "Liens - Admin";
require "template.php";
?>