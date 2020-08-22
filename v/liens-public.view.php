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

    <table class="table text-center">
        <tr class="table-dark">
            <th>Titre</th>
            <th>Page web</th>
            <th>Description</th>
        </tr>
        <?php
        for ($i = 0; $i < count($liens); $i++) :
            ?>
            <tr>
                <td class="align-middle"><a
                            href="<?= URL ?>liens/l/<?= $liens[$i]->getId(); ?>"><?=
                        $liens[$i]->getTitre(); ?></a></td>
                <td class="align-middle">
                    <a href="<?= $liens[$i]->getAd(); ?>"
                       target="_blank"><?= $liens[$i]->getAd(); ?></a>
                </td>
                <td class="align-middle"><?= $liens[$i]->getDes(); ?></td>

            </tr>
        <?php endfor; ?>
    </table>


<?php
$content = ob_get_clean();
$titre = "Liens";
require "template.php";
?>