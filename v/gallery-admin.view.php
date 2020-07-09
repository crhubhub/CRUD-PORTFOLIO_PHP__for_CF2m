<?php
$heading = "Manage Gallery";

ob_start();
?>
    <section class="page-section" id="header-manage">
        <div class="container mt-5">
            <h4 class="text-uppercase m-auto text-center"><?= $heading ?></h4>
            <p class="text-uppercase m-auto text-center"><a href="l-admin">Manage Links</a></p>
            <p class="text-uppercase m-auto text-center"><a href="m-admin">Messages</a></p>
        </div>
    </section>
    <section class="page-section" id="header-manage">
        <div class="container">
            <table class="table text-center">
                <tr class="table-dark">
                    <th>Image</th>
                    <th>Titre</th>
                    <th>Related file name</th>
                    <th>Posted</th>
                    <th colspan="2">Actions</th>
                </tr>

                <!--                on va chercher l'info de $posts dans post (car ce tableau $posts est public)-->
                <?php for ($i = 0; $i < count($postsArray); $i++) : ?>
                    <tr class="bg-info">
                        <td class="align-middle"><img
                                    src="public/gal-images/<?= $postsArray[$i]->getImage() ?>"
                                    width="110px"
                                    alt=""></td>
                        <td class="align-middle"><?= $postsArray[$i]->getTitle() ?></td>
                        <td class="align-middle"><?= $postsArray[$i]->getImage() ?></td>
                        <td class="align-middle"><?= $postsArray[$i]->getDate() ?></td>
                        <td class="align-middle"><a href="" class="btn bg-warning text-light
">Modifier</a></td>
                        <td class="align-middle"><a href="" class="btn bg-danger text-light
">Supprimer</a></td>
                    </tr>
                <?php endfor ?>
            </table>
        </div>
    </section>
    <section class="page-section" id="contact">
        <div class="container">
            <h2 class="text-uppercase m-auto text-center" style="font-size: 1.6em">Add an Image
            </h2>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <form id="contactForm" name="sentMessage" novalidate="novalidate">
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label for="name">Title</label>
                                <input class="form-control" id="name" type="text" placeholder="Name"
                                       required="required"
                                       data-validation-required-message="Please enter your name."/>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label for="name">Title</label>
                                <input class="form-control" id="name" type="text"
                                       placeholder="File --"
                                       required="required"
                                       data-validation-required-message="Please enter your name."/>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>

                        <br/>
                        <div id="success"></div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-xl" id="sendMessageButton"
                                    type="submit">
                                Send
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <div class="copyright py-4 text-center text-white p-auto" style="height: 4em"></div>
    <div class="copyright py-4 text-center text-white p-auto" style="height: 10em">
        <p class="mb-5">Job Done ? <a href="gallery"> Exit admin mode and see the updated
                result</a></p>
        <div class="container"><small>Copyright ©REUSS_Portfolio</small></div>
    </div>
<?php
$title = "Gallery";
$content = ob_get_clean();
require "admin-template.php";
?>