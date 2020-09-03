<?php
global $connected;
$connected = false;

if(isset($_POST['username']) && isset($_POST['passwd'])) {
//    echo 'values inserted';
    $user = $_POST['username'];
    $password = $_POST['passwd'];
    if ($user == 'formateur' && $password == 'CF2M') {
        echo '<h5 style="color: limegreen; margin-left: 50px">Vous êtes connecté.e</h5>';
    $connected = true;
    $_SESSION['connect'] = 1;
    } else echo '<h5 style="color: red; margin-left: 50px">Echec de connexion</h5>';
}

if (isset($_POST['disconnect_me']) && $_POST['disconnect_me'] == 1) {
    $_SESSION['connect'] = 0;
}

ob_start(); 
?>
    <a href="<?= URL ?>messages/a" class="btn btn-success d-block">Contacter</a>
    <section class="page-section portfolio" id="portfolio">
        <div class="container">
            <!-- Portfolio Grid Items-->
            <div class="row">
                <!-- Portfolio Item 1-->
                <div class="col-md-6 mb-5">
                    <div class="portfolio-item mx-auto" data-toggle="modal"
                         data-target="#portfolioModal1">
                        <a href="<?= URL ?>galerie-public"><div class="portfolio-item-caption d-flex
                    align-items-center
                    justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center
                        text-white"><p class="text-uppercase">Galerie</p></div>
                            </div></a>
                        <img class="img-fluid" src="assets/images/portfolio/gallery.jpg" alt=""/>
                    </div>
                </div>
                <div class="col-md-6 mb-5">
                    <div class="portfolio-item mx-auto" data-toggle="modal"
                         data-target="#portfolioModal1">
                        <a href="<?= URL ?>liens-public"><div class="portfolio-item-caption d-flex
                    align-items-center
                    justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center
                        text-white"><p class="text-uppercase">Interesting Links</p></div>
                            </div></a>
                        <img class="img-fluid" src="assets/images/portfolio/links.jpg" alt=""/>
                    </div>
                </div>
                <div class="col-md-6 mb-5">
                    <div class="portfolio-item mx-auto" data-toggle="modal"
                         data-target="#portfolioModal1">
                        <a href="<?= URL ?>tuto-partage"><div class="portfolio-item-caption d-flex
                    align-items-center
                    justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center
                        text-white"><p class="text-uppercase">
                                        Shared Tutorial <br> (Sass Introduction) </p></div>
                            </div></a>
                        <img class="img-fluid" src="assets/images/portfolio/shared-t.jpg" alt=""/>
                    </div>
                </div>
                <div class="col-md-6 mb-5">
                    <div class="portfolio-item mx-auto" data-toggle="modal"
                         data-target="#portfolioModal1">
                        <a href="<?= URL ?>tuto-cree">
                            <div class="portfolio-item-caption d-flex align-items-center
                    justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center
                        text-white"><p class="text-uppercase">My Tutorial <br> (Positioning in CSS3)
                                    </p></div>
                            </div>
                        </a>
                        <img class="img-fluid" src="assets/images/portfolio/self-t.jpg" alt=""/>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
$content = ob_get_clean();
$titre = "Clovis Reuss - Portfolio";
require "template.php";
?>