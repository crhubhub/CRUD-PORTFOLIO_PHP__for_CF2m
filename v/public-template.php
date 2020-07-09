<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>

    <title><?=$title?> | Clovis Reuss Portfolio</title>
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js"
            crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet"
          type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic"
          rel="stylesheet" type="text/css"/>
    <link href="css/scheme.css" rel="stylesheet"/>
    <link href="css/main.css" rel="stylesheet"/>
    <link rel="icon" type="image/png" href="assets/icons/clo-icon.png"/>
</head>
<body id="page-top">
<?php
include "v/navbar.view.php";
include "v/header.view.php";
echo $content;
?>







<?php
include "v/contact-form.view.php";
include "v/footer.view.php";
include "plugins.php";
?>
</body>
</html>

