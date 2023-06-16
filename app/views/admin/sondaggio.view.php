<?php $patient = app\App::$app->patient->getById($element['patient_id']); ?>

<div class="container pt-5">

    <header class="mb-5 d-flex justify-content-between align-items-center">
        <a href="<?= app\App::$app->router->getPreviousPage() ?>" class="btn btn-outline-primary border-0 no-hover">
            <i class="fa-solid fa-circle-chevron-left me-md-2"></i>
            <span class="d-none d-md-inline">
                Indietro
            </span>
        </a>
        <!-- DELETE BUTTON -->
        <button class="btn btn-outline-danger border-0 no-hover" data-bs-toggle="modal" data-bs-target="#delete-patient-modal">
            <i class="fa-solid fa-trash-can me-2"></i>
            Elimina
        </button>

        <!-- DELETE MODAL -->
        <div class="modal fade" id="delete-patient-modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="delete-patient-modal-Label">Conferma eliminazione</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Sei sicuro di voler eliminare <em><?= $element['title'] ?></em> di <strong><?= $patient['fname'] . ' ' . $patient['lname'] ?></strong></p>
                    </div>
                    <!-- BUTTONS -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ANNULLA</button>
                        <form action="sondaggi/delete" method="POST">
                            <input type="hidden" value="<?= $element['id'] ?>" name="id">
                            <button type="submit" class="btn btn-danger">ELIMINA</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <h1>Sondaggio di <a href="/admin/pazienti?id=<?= $patient['id'] ?>"><?= $patient['fname'] . ' ' . $patient['lname'] ?></a></h1>

    <section id="survey">

        <?= var_dump($surveys) ?>

    </section>

</div>

<script src="/js/survey.js"></script>