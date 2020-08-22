<?php 
ob_start(); 

if(!empty($_SESSION['alert'])) :
?>
<div class="alert alert-<?= $_SESSION['alert']['type'] ?>" role="alert">
    <?= $_SESSION['alert']['msg'] ?>
</div>
<?php 
unset($_SESSION['alert']);
endif; 
?>
    <article class="container-fluid">
        <section class="page-section" id="contact">
            <div class="container pt-2">
                <h6 class="text-center mb-2">CSS provides all the tools to create
                    beautiful and responsive web pages, that is, suitable for all
                    screen sizes. But it's also a language known to be difficult to organize, with little inherent structure. With all of its color, layout and typography options, a .css file can quickly get quite bushy and get lost very easily, especially when the amount of code becomes large.</h6>
                <br>
                <h6 class="text-center mb-2">Sass will allow you to:</h6>
                    <ul>
                        <li>Write <strong><em>clean, organized and well
                                    structured</em></strong> code</li>
                        <li>Have a <strong><em>maintainable and modular
                            style</em></strong></li>
                        <li><strong><em>Code faster</em></strong> and more efficiently</li>
                    </ul>
                </>
            <br>
                <h6 class=" text-center mb-5 mt-2">
                    I really appreciated the discovery of this sass language thanks to these tutorial videos well explained by the Youtuber Grafikart so I share them with you below.</h6>
            </div>
        </section>
    </article>
    <div class="container">
        <iframe class="18" width="1120" height="630" src="https://www.youtube.com/embed/aOccUzHD_MQ"
                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
        </iframe>
    </div>
<?php
$content = ob_get_clean();
$titre = "Tuto partagé";
require "template.php";
?>