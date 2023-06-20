<div class="vh-100 container-fluid d-flex flex-column justify-content-center align-items-center">

    <?php if (!isset($_SESSION['login'])) : ?>

        <div class="col-12 col-md-6 col-lg-3">

            <figure class="text-center mb-5">
                <img src="/img/Favicon.png" alt="logo">
            </figure>

            <form class="" autocomplete="off" action="/test/login" method="POST">
                <label class="text-center mb-3 w-100" for="name">Inserisci il tuo username nel formato nome.cognome</label>
                <input type="text" class="form-control mb-3" name="name" id="name" placeholder="nome.cognome" autocomplete="off">
                <button type="submit" class="btn btn-login d-block w-100 mb-3" name="login">Accedi</button>
            </form>

            <?php

            $isInvalid = app\App::$app->session->getFlash('isInvalid');

            if ($isInvalid) : ?>
                <div class="callout callout-danger d-flex align-items-center" role="alert">
                    <i class="fa-solid fa-triangle-exclamation me-3"></i>
                    <div>
                        <?= $isInvalid ?>
                    </div>
                </div>
            <?php endif ?>

        <?php else : ?>

            <h1>Benvenuto <?= $user['fname'] ?>, ci sono <?= count($surveys) ?> test per te:</h1>
            <ul class="list-unstyled">
                <?php foreach ($surveys as $survey) : ?>
                    <li><?= $survey['title'] ?></li>
                <?php endforeach ?>
            </ul>
            <form action="/test/logout" method="POST">
                <button>logout</button>
            </form>
        <?php endif ?>
        </div>


</div>