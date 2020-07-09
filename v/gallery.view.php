<?php
$heading = "Gallery";
ob_start();
?>
<section class="page-section" id="tuto-reviewed">
    <div class="container">
        <h2 class="page-section-heading text-center text-uppercase text-secondary
            mb-0">
            <?=$heading?></h2>
    </div>
</section>

<section class="page-section portfolio simple-cursor" id="gallery">
    <div class="container">
        <div class="row">
            <?php for($i = 0; $i < count($postsArray); $i++) : ?>
            <div class="col-md-6 mb-5 simple-cursor">
                <div class="portfolio-item mx-auto" data-toggle="modal"
                     data-target="#portfolioModal1">
                    <div class="portfolio-item-caption d-flex
                    align-items-center
                    justify-content-center h-100 w-100">
                            <div class="portfolio-item-caption-content text-center
                        text-white"><p
                                        class="text-uppercase"><?=$postsArray[$i]->getTitle()?></p></div>
                        </div>
                    <img class="img-fluid"
                         src="public/gal-images/<?=$postsArray[$i]->getImage()?>" alt=""/>
                </div>
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
