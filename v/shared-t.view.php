<?php
$heading = "Shared Tutorial";
ob_start();
?>
<section class="page-section" id="tuto-reviewed">
    <div class="container">
        <h2 class="page-section-heading text-center text-uppercase text-secondary
            mb-0">
            <?=$heading?></h2>
    </div>
</section>
<article class="container-fluid">
    <section class="page-section" id="contact">
        <div class="container pt-2">
            <h6 class="text-center mb-2">Sass is a preprocessor scripting language that is
                interpreted or
                compiled
                into
                Cascading Style Sheets (CSS).</>
            <h6 class=" text-center mb-5 mt-2">
                Here is a playlist of videos made by Grafikart which will explain how to use it.
            </h6>
        </div>
    </section>
</article>
<div class="container">
    <iframe class="18" width="1120" height="630" src="https://www.youtube.com/embed/aOccUzHD_MQ"
            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
    </iframe>
</div>

<?php
$title = "Shared Tutorial | Portfolio Clovis Reuss";
$content = ob_get_clean();
require "public-template.php";
?>
