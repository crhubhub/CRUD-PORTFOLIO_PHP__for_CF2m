<?php
$heading = "Manage Links";

ob_start();
?>
<section class="page-section" id="header-manage">
    <div class="container mt-5">
        <p class="text-uppercase m-auto text-center"><a href="g-admin">Manage Gallery</a></p>
        <h4 class="text-uppercase m-auto text-center"><?= $heading ?></h4>
        <p class="text-uppercase m-auto text-center"><a href="m-admin">Messages</a></p>
    </div>
</section>
<section class="page-section" id="header-manage">
    <div class="container-fluid">
        <table class="table text-center">
            <tr class="table-dark">
                <th>Name</th>
                <th>Address</th>
                <th colspan="6">Description</th>
                <th colspan="2">Actions</th>
            </tr>

            <?php for ($i = 0; $i < count($linksArray); $i++) : ?>
            <tr class="bg-info">
                <td class="align-middle"><?=$linksArray[$i]->getTitle()?></td>
                <td class="align-middle"><?=$linksArray[$i]->getAddress()?></td>
                <td colspan="6" class="align-middle"><?=$linksArray[$i]->getDescription() ?>
                </td>
                <td class="align-middle"><a href="" class="btn bg-warning text-light">Modifier</a>
                </td>
                <td class="align-middle"><a href="" class="btn bg-danger text-light">Supprimer</a>
                </td>
            </tr>
            <?php endfor?>

        </table>
    </div>
</section>

<section class="page-section" id="contact">
    <div class="container">
        <h2 class="text-uppercase m-auto text-center" style="font-size: 1.6em">Add a Link
        </h2>
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <form id="contactForm" name="sentMessage" novalidate="novalidate">
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label for="name">Name</label>
                            <input class="form-control" id="name" type="text" placeholder="Name"
                                   required="required"
                                   data-validation-required-message="Please enter your name."/>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label for="email">Address</label>
                            <input class="form-control" id="email" type="email"
                                   placeholder="Web Address" required="required"
                                   data-validation-required-message="Please enter your email address."/>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label for="message">Description</label>
                            <textarea class="form-control" id="message" rows="5"
                                      placeholder="Description" required="required"
                                      data-validation-required-message="Please enter a message."></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br/>
                    <div id="success"></div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-xl" id="sendMessageButton" type="submit">
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
    <p class="mb-5">Job Done ? <a href="links"> Exit admin mode and see the updated result</a></p>
    <div class="container"><small>Copyright ©REUSS_Portfolio</small></div>
</div>
<?php
$title = "Links";
$content = ob_get_clean();
require "admin-template.php";
?>
