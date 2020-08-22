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
        <th colspan="2">Actions</th>
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

        <td class="align-middle"><a href="<?= URL ?>galerie/m/<?= $posts[$i]->getId(); ?>"
                                    class="btn btn-warning">Modifier</a></td>
        <td class="align-middle">
            <form method="POST" action="<?= URL ?>galerie/s/<?= $posts[$i]->getId(); ?>"
                  onSubmit="return confirm('Voulez-vous vraiment supprimer le post ?');">
                <button class="btn btn-danger" type="submit">Supprimer</button>
            </form>
        </td>
    </tr>
    <?php endfor; ?>
</table>
<a href="<?= URL ?>galerie/a" class="btn btn-success d-block">Ajouter</a>

<?php
$content = ob_get_clean();
$titre = "Galerie - Admin";
require "template.php";
?>