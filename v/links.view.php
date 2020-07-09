<?php
$heading = "Links";

ob_start();
?>

<?php //for ($count = 0; $count<1; $count++)?>
<!--    Vous avez --><? //=$count?>
<?php //if($count > 1) echo" messages"; else echo " message"?>

<section class="page-section portfolio simple-cursor" id="links">
    <div class="container">
        <h1 class="text-center mb-5">
            Here is my compilation of interesting links:</h1><br>
        <div class="row p-3">

            <?php for($i = 0; $i < count($linksArray); $i++) : ?>
            <div class="col-md-5 ml-md-5 mb-5 simple-cursor btn bg-primary">
                <a class="text-light" href="https://www.sololearn.com/" target="_blank">
                    <div class="portfolio-item mx-auto" data-toggle="modal"
                         data-target="#portfolioModal1">
                        <strong class="text-uppercase"><?=$linksArray[$i]->getTitle()?></strong>
                        <br><?=$linksArray[$i]->getDescription()?>
                    </div>
                </a>
            </div>
            <?php endfor ?>
        </div>
    </div>
</section>

<?php
$title = "Gallery | Portfolio Clovis Reuss";
$content = ob_get_clean();
require "public-template.php";
?>
