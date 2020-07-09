<?php
$heading = "Archived Messages";

ob_start();
?>
<section class="page-section" id="header-manage">
    <div class="container mt-5">
        <p class="text-uppercase m-auto text-center"><a href="g-admin">Manage Gallery</a></p>
        <p class="text-uppercase m-auto text-center"><a href="l-admin">Manage Links</a></p>
        <h4 class="text-uppercase m-auto text-center"><?= $heading ?></h4>
    </div>
</section>
<section class="page-section" id="header-manage">
    <div class="container-fluid">
        <table class="table text-center">
            <tr class="table-dark">
                <th>User Name</th>
                <th>Email Address</th>
                <th>Phone</th>
                <th colspan="6">Message</th>
                <th>Date</th>
                <th colspan="2">Actions</th>
            </tr>

            <?php for ($i = 0; $i < count($messagesArray); $i++) : if
            ($messagesArray[$i]->getArchived = true) :?>
                <tr class="bg-light">
                    <td class="align-middle"><?=$messagesArray[$i]->getName() ?></td>
                     <td class="align-middle"><?=$messagesArray[$i]->getEmail() ?></td>
                   <td class="align-middle"><?=$messagesArray[$i]->getPhone() ?></td>
                   <td colspan="6" class="align-middle"><?=$messagesArray[$i]->getMessageTxt() ?>
                  </td>
                    <td class="align-middle"><?=$messagesArray[$i]->getDate() ?></td>
                      <td class="align-middle"><a href="" class="btn bg-info
                     text-light">Unarchive</a></td>
                     <td class="align-middle"><a href="" class="btn bg-danger text-light">Delete</a></td>
            </tr>
            <?php endif ?>
            <?php endfor?>
        </table>
        <p class="m-auto text-center"><a href="m-admin">Manage regular messages</a></p>
    </div>
</section>
<div class="copyright py-4 text-center text-white p-auto" style="height: 4em"></div>
<div class="copyright py-4 text-center text-white p-auto" style="height: 10em">
    <p class="mb-5">Job Done ? <a href=""> Exit admin mode</a></p>
    <div class="container"><small>Copyright ©REUSS_Portfolio</small></div>
</div>
<?php
$title = "Links";
$content = ob_get_clean();
require "admin-template.php";
?>
