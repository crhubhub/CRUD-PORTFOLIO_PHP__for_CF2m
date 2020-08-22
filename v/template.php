<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$titre?></title>
<!--    <link rel="stylesheet" href="https://bootswatch.com/4/sketchy/bootstrap.min.css">-->
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js"
            crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet"
          type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic"
          rel="stylesheet" type="text/css"/>
    <link href="css/scheme.css" rel="stylesheet"/>
    <link rel="icon" type="image/png" href="assets/icons/clo-icon.png"/>
</head>
<body>
<?php if (isset($_SESSION['connect']) && ($_SESSION['connect'] == 1)): ?>
    <form action="<?= URL ?>accueil" method="post">
        <label for="disconnect_me"></label>
        <input style="visibility: hidden; z-index: -2" type="text"
               class="form-control"
               id="disconnect_me"
               name="disconnect_me" value="1">
<button type="submit" style="margin-left: 350px; background: dodgerblue">Je me
    déconnecte</button>
    </form>
<?php endif; ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= URL ?>accueil">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URL ?>galerie-public">Galerie</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URL ?>liens-public">Liens</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URL ?>tuto-partage">Tuto partagé</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URL ?>tuto-cree">Tuto créé</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URL ?>admin-connect">Vers
                        Admin</a>
                </li>
            </ul>
        </div>
        <?php if (isset($_SESSION['connect']) && ($_SESSION['connect'] == 1)): ?>
        <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav mr-auto bg-info">
                <li>ADMIN : </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URL ?>galerie">Galerie - ADMIN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URL ?>liens">Liens - ADMIN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URL ?>messages">Messages - ADMIN</a>
                </li>

            </ul>
        </div>
        <?php endif; ?>
    </nav>

    <div class="container">
        <h1 class="rounded border border-dark p-2 m-2 text-center text-white bg-info"><?= $titre ?></h1>
        <?= $content ?>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>