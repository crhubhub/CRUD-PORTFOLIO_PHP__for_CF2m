<?php
$url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);
ob_start();
?>

    <div class="row">
        <div class="col-6">
            <p>Titre : <?= $message->getTitre(); ?></p>
            <p>Auteur : <?= $message->getAuteur(); ?></p>
            <p>Email : <?= $message->getEmail(); ?></p>
            <p>Communication : <?= $message->getCmn(); ?></p>
            <br><br>
            <h4 class="bg-success" id="repondreButton">Répondre
                à <?= $message->getAuteur()
                ?> :</h4>
        </div>
    </div>
    <div class="row">
        <form method="POST" id="repondreForm" action="<?= URL ?>reponseOK"
              enctype="multipart/form-data">
            <div>
                <label for="origine"></label>
                <input type="text" style="visibility: hidden" value="<?= $message->getAuteur();
                ?>"
                       class="form-control" id="origine"
                       name="origine">
            </div>
            <div class="form-group">
                <label for="auteur">Votre Nom : </label>
                <input type="text" class="form-control" value="Admin" id="auteur"
                       name="auteur">
            </div>
            <div class="form-group">
                <label for="titre">Objet : </label>
                <input type="text" value="RE: <?= $message->getTitre(); ?>" class="form-control" id="titre"
                       name="titre">
            </div>
            <div class="form-group">
                <label for="email">Email : </label>
                <input type="text" value="<?= $message->getEmail(); ?>" class="form-control" id="email"
                       name="email">
            </div>
            <div class="form-group">
                <label for="cmn">Message : </label>
                <textarea type="text" class="form-control" id="cmn" rows="5"
                          name="cmn">
        </textarea>
            </div>
            <button type="submit" name="sendReponse" class="btn
            btn-primary">Valider</button>

        </form>
    </div>


<? //= URL ?><!--repondre/--><? //=$url[2]; ?>
<?php
$content = ob_get_clean();
$titre = $message->getTitre();
require "template.php";
?>