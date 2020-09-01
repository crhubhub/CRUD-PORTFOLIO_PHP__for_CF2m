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
        <th>Récent ?</th>
        <th>Titre</th>
        <th>Auteur</th>
        <th>Email</th>
        <th>Communication</th>
        <th>Date</th>
        <th colspan="1">Actions</th>
    </tr>
<?php
$notScreenedYet = true;
$notScreenedYetB = true;
$notScreenedYetC = true;
for ($i = 0; $i < count($messages); $i++) :
    $depuisMinuitCeMatin = round((((time() - strtotime($messages[$i]->getDate())
            ) / 3600) - date('H')+15)) - (date('H')+2);
    ?>
    <tr<?php if ($depuisMinuitCeMatin < 24) : ?>
        style="background: rgba(0, 200, 100, 0.3)"
    <?php elseif ($depuisMinuitCeMatin < 168) : ?>
        style="background: rgba(0, 100, 0, 0.3)"
    <?php else: ?>
        style="background: rgba(0, 100, 200, 0.3)"
    <?php endif; ?>
    >
    <td>

    <?php if ($depuisMinuitCeMatin < 24) : ?>
    <?php if ($notScreenedYet) : ?>🍅*<br><p style="font-size:
                10px">* Today or yesterday</p><?php
        $notScreenedYet = false; endif; ?>
<?php elseif ($depuisMinuitCeMatin < 168) : ?>
    <?php if ($notScreenedYetB) : ?>🧅*<br><p style="font-size:
                10px">* Less than 7 days</p><?php
        $notScreenedYetB = false; endif;?>
    <?php else : ?>
        <?php if ($notScreenedYetC) : ?>🥔*<br><p style="font-size:
                10px">* More than 7 days</p><?php
            $notScreenedYetC = false; endif;?>
    <?php endif ?>
    </td>
    <td class="align-middle"><a
                href="<?= URL ?>messages/l/<?= $messages[$i]->getId(); ?>"><?= $messages[$i]->getTitre(); ?></a></td>
    <td class="align-middle"><?= $messages[$i]->getAuteur(); ?></td>
    <td class="align-middle"><?= $messages[$i]->getEmail(); ?></td>
    <td class="align-middle"><?= $messages[$i]->getCmn();?></td>
    <td class="align-middle"><?php
        $heure = substr($messages[$i]->getDate(),
                11, 2) . ' h ' . substr($messages[$i]->getDate(),
                14, 2);
        if ($depuisMinuitCeMatin < 24) : ?><?= $heure ?><br>
            <?php if ($depuisMinuitCeMatin < 0) : ?>Aujourd'hui
            <?php else: ?>
                Hier
            <?php endif ?>

            <?php else: ?>
            <?= $heure ?><br><em style="font-size: 11px">il y a</em>
        <?= round(($depuisMinuitCeMatin +(date('H')+2)) / 24)?>
            <em style="font-size: 11px"> jours</em>
        <?php endif ?>

        <br><em style="font-size: 13px; color: slategrey">le <?=
        (substr($messages[$i]->getDate()
            , 8,
            2)) . '/' .
        (substr($messages[$i]->getDate()
            , 5,
            2)) . '/' . (substr($messages[$i]->getDate()
            , 0,
            4)) ?> </em></td>
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