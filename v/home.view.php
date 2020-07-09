<?php

ob_start();
?>
<section class="page-section portfolio" id="portfolio">
    <div class="container">
        <!-- Portfolio Grid Items-->
        <div class="row">
            <!-- Portfolio Item 1-->
            <div class="col-md-6 mb-5">
                <div class="portfolio-item mx-auto" data-toggle="modal"
                     data-target="#portfolioModal1">
                    <a href="gallery"><div class="portfolio-item-caption d-flex
                    align-items-center
                    justify-content-center h-100 w-100">
                            <div class="portfolio-item-caption-content text-center
                        text-white"><p class="text-uppercase">Gallery</p></div>
                        </div></a>
                    <img class="img-fluid" src="assets/images/portfolio/gallery.jpg" alt=""/>
                </div>
            </div>
            <div class="col-md-6 mb-5">
                <div class="portfolio-item mx-auto" data-toggle="modal"
                     data-target="#portfolioModal1">
                    <a href="links"><div class="portfolio-item-caption d-flex
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
                    <a href="shared-tutorial"><div class="portfolio-item-caption d-flex
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
                    <a href="positioning-tutorial">
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
$title = "PHP C.R.U.D. @Cf2m";
$content = ob_get_clean();
require "public-template.php";
?>
