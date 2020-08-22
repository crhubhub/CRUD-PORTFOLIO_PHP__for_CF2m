<?php
ob_start();

if (!empty($_SESSION['alert'])) :
    ?>
    <div class="alert alert-<?= $_SESSION['alert']['type'] ?>" role="alert">
        <?= $_SESSION['alert']['msg'] ?>
    </div>
    <?php
    unset($_SESSION['alert']);
endif;
?>
<br><h5>Classé par Auteur</h5>
<h6><a href="<?= URL ?>messages">-> voir les nouveaux messages d'abord
        <-</a><br></h6>
<table class="table text-center">
    <tr class="table-dark">
        <th>Auteur</th>
        <th>Titre</th>
        <th>Email</th>
        <th>Communication</th>
        <th colspan="1">Actions</th>
    </tr>
    <?php $ligneSup = 'azerty' ?>
    <?php for ($i = 0; $i < count($messages); $i++) : ?>
        <tr>
            <?php if (($ligneSup == $messages[$i]->getAuteur()) &&  $ligneSup != 'azerty'): ?>
            <?php endif; ?>
            <td class="align-middle">
                <h5>
                    <?php if ($ligneSup != $messages[$i]->getAuteur()) : ?>
                        <?= $messages[$i]->getAuteur(); ?>
                    <?php endif; ?>
                    <?php $ligneSup = $messages[$i]->getAuteur(); ?>
                </h5>
            </td>
            <td class="align-middle"><a href="<?= URL ?>messages/l/<?=
                $messages[$i]->getId(); ?>"><?= $messages[$i]->getTitre(); ?></a>
            </td>
            <td class="align-middle"><?= $messages[$i]->getEmail(); ?></td>
            <td class="align-middle"><?= $messages[$i]->getCmn(); ?></td>
            <td class="align-middle">
                <form method="POST"
                      action="<?= URL ?>messages/s/<?= $messages[$i]->getId(); ?>"
                      onSubmit="return confirm('Voulez-vous vraiment supprimer le message ?');">
                    <button class="btn btn-danger" type="submit">Supprimer
                    </button>
                </form>
            </td>
        </tr>
    <?php endfor; ?>
</table>


<?php
$content = ob_get_clean();
$titre = "Messages - Admin";
require "template.php";
?>
