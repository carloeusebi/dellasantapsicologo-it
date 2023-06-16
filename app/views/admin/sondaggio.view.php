<?php $patient = app\App::$app->patient->getById($element['patient_id']); ?>

<div class="container pt-5">

    <header class="mb-5 d-flex justify-content-between align-items-center">
        <a href="<?= app\App::$app->router->getPreviousPage() ?>" class="btn btn-outline-primary border-0 no-hover">
            <i class="fa-solid fa-circle-chevron-left me-md-2"></i>
            <span class="d-none d-md-inline">
                Indietro
            </span>
        </a>
        <h1>Sondaggio di <?= $patient['fname'] . ' ' . $patient['lname'] ?></h1>
    </header>

    <section id="survey">

        <?= var_dump($surveys) ?>

    </section>

</div>

<script src="/js/survey.js"></script>