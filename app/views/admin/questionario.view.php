<div class="container">

    <header class="d-flex justify-content-between my-5">

        <a href="/admin/questionari" class="btn btn-secondary me-3">
            <i class="fa-solid fa-circle-chevron-left me-2"></i>
            Indietro
        </a>
    </header>
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">

                <h5 class="card-title"><?= $element['question'] ?></h5>

                <!-- DELETE BUTTON -->
                <button class="btn btn-outline-danger border-0 no-hover" data-bs-toggle="modal" data-bs-target="#delete-question-modal">
                    <i class="fa-solid fa-trash-can me-md-2"></i>
                    <span class="d-none d-md-inline">Elimina</span>
                </button>

                <!-- DELTE MODAL -->
                <div class="modal fade" id="delete-question-modal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="delete-question-modal-Label">Conferma eliminazione</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Sei sicuro di voler eliminare <strong><?= $element['question'] ?></strong></p>
                            </div>
                            <!-- BUTTONS -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ANNULLA</button>
                                <form action="/admin/questionari/delete" method="POST">
                                    <input type="hidden" value="<?= $element['id'] ?>" name="id">
                                    <button type="submit" class="btn btn-danger">ELIMINA</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- FORM -->
            <form class="row g-3 question-form" action="/admin/questionari/update" method="POST">
                <!-- title -->
                <div class="col-12 col-md-8">
                    <label for="question" class="form-label h6">Titolo</label>
                    <input type="text" class="form-control" id="question" name="question" value="<?= $element['question'] ?>">
                </div>
                <!-- type -->
                <div class="col-12 col-md-4">
                    <label for="type" class="form-label h6">Tipo di risposte</label>
                    <select class="form-select" name="type" id="type">
                        <option <?= $element['type'] === '1-4' ? 'selected' : '' ?>>1-4</option>
                        <option <?= $element['type'] === '1-6' ? 'selected' : '' ?>>1-6</option>
                        <option <?= $element['type'] === '0-5' ? 'selected' : '' ?>>0-5</option>
                        <option <?= $element['type'] === '0-3' ? 'selected' : '' ?>>0-3</option>
                        <option <?= $element['type'] === '1-7' ? 'selected' : '' ?>>1-7</option>
                        <option <?= $element['type'] === '0-4' ? 'selected' : '' ?>>0-4</option>
                        <option <?= $element['type'] === '1-5' ? 'selected' : '' ?>>1-5</option>
                    </select>
                </div>
                <!-- descrizione -->
                <div class="col-12">
                    <label for="description" class="form-label h6">Descrizione</label>
                    <textarea class="form-control" id="description" rows="3" name="description"><?= $element['description'] ?></textarea>
                </div>

                <!-- legends -->
                <?php $legends = isset($element['legend']) ? explode(';', $element['legend']) : [] ?>

                <p class="h6">Legenda</p>
                <div class="row row-cols-1 row-cols-md-2 mt-0" id="legend-container">

                    <?php foreach ($legends as $legend) : ?>
                        <input type="hidden" data-legend value="<?= $legend ?>">
                    <?php endforeach ?>
                </div>

                <!-- answers -->
                <div>
                    <p class="h6">Lista delle domande</p>
                    <ul class="list-unstyled mb-1">
                        <?php $answers = isset($element['answers']) ? explode(';', $element['answers']) : [];

                        for ($i = 0; $i < count($answers); $i++) : ?>

                            <li class="d-flex align-items-center my-1" data-list="<?= $i ?>">
                                <input type="text" class="form-control" data-answer="<?= $i ?>" value="<?= $answers[$i] ?>">
                                <button type="button" class="btn btn-outline-danger border-0 no-hover" data-delete="<?= $i ?>" tabindex="-1">
                                    <i class="fa-solid fa-trash-can fa-sm ms-2"></i>
                                </button>
                            </li>

                        <?php endfor ?>
                    </ul>

                    <div class="d-flex align-items-center my-1">
                        <input type="text" class="form-control" id="add-answer">
                        <button type="button" class="btn btn-outline-primary border-0 no-hover" id="add-button">
                            <i class=" fa-solid fa-plus fa-sm ms-2"></i>
                        </button>
                    </div>
                </div>

                <!-- SUBMIT BUTTON -->
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Salva le modifiche</button>
                </div>

            </form>
        </div>
    </div>
</div>

<script src="/js/question.js"></script>