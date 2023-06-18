<?php

use app\App; ?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Carlo Eusebi">
    <meta name="description" content="Psicologo Cognitivo Comportamentale, mi occupo di consulenze psicologiche, sostegno e propongo percorsi individualizzati a Fano e online. Prenota la tua consulenza.">
    <title>Dellasanta Psicologo | Admin</title>
    <link rel="icon" href="/img/Favicon.png" type="image/png">
    <!-- fontawaseome -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css' integrity='sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==' crossorigin='anonymous'>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <!-- my css -->
    <link rel="stylesheet" type="text/css" href="/styles/admin.css">
</head>

<body>
    <?php if ($page !== 'login') : ?>
        <nav class="navbar navbar-expand-lg bg-body-tertiary position-fixed top-0 start-0 end-0 z-3">
            <div class="container-fluid">
                <img class="logo me-4" src="/img/Logo.webp" alt="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link <?= $this->urlIs('/admin') ? ' active' : '' ?>" href="/admin">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $this->urlIs('/admin/pazienti') ? ' active' : '' ?>" href="/admin/pazienti">Pazienti</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $this->urlIs('/admin/sondaggi') ? ' active' : '' ?>" href="/admin/sondaggi">Sondaggi</a>
                        </li>
                    </ul>
                    <form action="/logout" method="POST">
                        <div>
                            <button type="submit" name="logout" class="btn btn-danger">Esci</button>
                        </div>
                    </form>
                </div>
            </div>
        </nav>

        <main class="min-vh-100 bg-body-secondary py-5">

            <div class="container flash-alerts">

                <?php if (App::$app->session->getFlash('success')) : ?>
                    <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
                        <i class="fa-solid fa-circle-check me-2"></i>
                        <?= App::$app->session->getFlash('success') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif ?>

                <?php if (App::$app->session->getFlash('errors')) : ?>
                    <div class="alert alert-warning alert-dismissible fade show mt-5" role="alert">
                        <p><strong><i class="fa-solid fa-triangle-exclamation me-2"></i>
                                Ci sono stati uno o più errori:</strong></p>
                        <?php foreach (App::$app->session->getFlash('errors') as $error) : ?>
                            <p><?= $error ?></p>
                        <?php endforeach; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif ?>
            </div>

            <?= $content ?>

        </main>

    <?php else : ?>

        <?= $content ?>

    <?php endif; ?>



</body>

</html>