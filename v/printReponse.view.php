<?php
if (isset($_POST['sendReponse'])) {
    $depuis = $_POST['auteur'];
    $vers = $_POST['origine'];
    $titre = $_POST['titre'];
    $cmn = $_POST['cmn'];
    $email = $_POST['email'];
    $fromEmail = 'clo.dvlpr@gmail.com';

    $to = $email;
    $subject = $titre;
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: '.$fromEmail.'<'.$fromEmail.'>' . "\r\n".'Reply-To: '
        .$fromEmail."\r\n" . 'X-Mailer: PHP/' . phpversion();
    $message = '<!doctype html>
			<html lang="en">
			<head>
				<meta charset="UTF-8">
				<meta name="viewport"
					  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
				<meta http-equiv="X-UA-Compatible" content="ie=edge">
				<title>$titre</title>
			</head>
			<body>
			<span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">'.$cmn.'</span>
				<div class="container">
                 '.$cmn.'<br><br>
                    Regards <br>Send by '.$depuis.'<br/>
                  '.$fromEmail.'
				</div>
			</body>
			</html>';
    mail($to, $subject, $message, $headers);

}

ob_start();
?>
<?php

?>
    <div>
        <h4>Contenu du message :</h4>
        <div style="border-radius: 0.5em; padding-left: 0.5em ; background: rgba(200,200, 200,0.5)">
            <p>de la part de</p>
            <h5 class="bg-success" style="border-radius: 0.5em;
            margin-left: -0.4em ; padding-left: 0.5em; margin-right: auto;
            color: white"><?=
                $depuis ?></h5>
        </div>
        <div style="border-radius: 0.5em; padding-left: 0.5em ; background: rgba(200,200, 200,0.5)">
            <p>destinataire</p>
            <h5 class="bg-success" style="border-radius: 0.5em;margin-left: -0.4em ;
    padding-left: 0.5em; margin-right: auto; color: white"><?= $vers ?>
                (<?= $email ?>)</h5>
        </div>
        <div style="border-radius: 0.5em; padding-left: 0.5em ; background: rgba(200,200, 200,0.5)">
            <p>Message</p>
            <div class="bg-success" style="border-radius: 0.5em;margin-left: -0.4em ;
    padding-left: 0.5em; margin-right:
    auto; color: white"><h5><?= $titre ?></h5>
                <p><?= $cmn ?></p></div>
        </div>
    </div>
    <a href="<?= URL ?>messages" class="btn btn-primary">Retour aux messages</a>
<?php
$content = ob_get_clean();
$titre = 'Message envoyé';
require "template.php";
?>