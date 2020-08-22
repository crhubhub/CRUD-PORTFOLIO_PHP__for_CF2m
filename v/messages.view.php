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
    <br><h5>Les plus récents d'abord</h5>
    <h6><a href="<?= URL ?>mpa">-> grouper par auteur ici <-</a><br></h6>
    <table class="table text-center">
        <tr class="table-dark">
            <th>Titre</th>
            <th>Auteur</th>
            <th>Email</th>
            <th>Communication</th>
            <th colspan="1">Actions</th>
        </tr>
        <?php
        for ($i = 0; $i < count($messages); $i++) :
            ?>
            <tr>
                <td class="align-middle"><a
                            href="<?= URL ?>messages/l/<?= $messages[$i]->getId(); ?>"><?=
                        $messages[$i]->getTitre(); ?></a></td>
                <td class="align-middle"><?= $messages[$i]->getAuteur(); ?></td>
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