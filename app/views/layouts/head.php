<?php require "../app/functions.php"; ?>

<!DOCTYPE html>
<html lang="it">
<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-PPT73ZG');</script>
    <!-- End Google Tag Manager -->

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Carlo Eusebi">
    <meta name="description" content="Psicologo Cognitivo Comportamentale, mi occupo di consulenze psicologiche, sostegno e propongo percorsi individualizzati a Fano e online. Prenota la tua consulenza.">

    <title>Dellasanta Psicologo Fano | <?= $pageTitle ?></title>

    <link rel="icon" href="img/Favicon.png" type="image/png">
    <!-- font awesome -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css' integrity='sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==' crossorigin='anonymous'>
    <!-- bootstrap icons -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.css' integrity='sha512-0yYhCyiMB+6XOis4qvWA42kPkKb54+uMaOhbsta6m+aQ7cZOm5hzERPrRkkknlpEdoxVCwYui+yM0jRazpDFuA==' crossorigin='anonymous'/>
    <!--  my library -->
    <link rel="stylesheet" href="styles/mylibrary.css" type="text/css">
    <!-- animations -->
    <link rel="stylesheet" href="styles/animations.css" type="text/css">
    <!-- styles.css -->
    <link rel="stylesheet" href="styles/styles.css" type="text/css">

    
    <!-- scripts -->
    <script defer src="scripts/scripts.js"></script>
</head>
<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PPT73ZG"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <header id="top-header">
        <div class="container d-flex justify-space-between align-center">
            <div id="hdr-logo">
                <a href="https://www.dellasantapsicologo.it" target="_blank">
                    <img class="fluid-img" src="img/Logo.webp" alt="logo del sito">
                </a>
            </div>
            <div id="hamburger-menu" class="m-20">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <nav id="top-navbar">
                <ul>
                    <li><a href="/" <?= urlIs('/') ? 'class="active"' : '' ?>>Home</a></li>
                    <li><a href="/chi-sono" <?= urlIs('/chi-sono') ? 'class="active"' : '' ?>>Chi Sono</a></li>
                    <li><a href="/cosa-aspettarsi" <?= urlIs('/cosa-aspettarsi') ? 'class="active"' : '' ?>>Cosa aspettarsi dalla Terapia</a></li>
                    <li><a href="/di-cosa-mi-occupo"<?= urlIs('/di-cosa-mi-occupo') ? 'class="active"' : '' ?>>Di cosa mi Occupo</a></li>
                    <li><a href="/contatti"<?= urlIs('/contatti') ? 'class="active"' : '' ?>>Contatti</a></li>
                </ul>
            </nav>
        </div>
    </header>