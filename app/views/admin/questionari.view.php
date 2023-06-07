<?php if (isset($_GET['id'])) :
    require_once __DIR__ . '/question.php'; ?>
<?php else : ?>
    <div class="container">

        <header class="d-flex justify-content-between my-5">

            <a href="/admin/sondaggi" class="btn btn-secondary me-3">
                <i class="fa-solid fa-circle-chevron-left me-2"></i>
                Indietro
            </a>

            <form class="d-flex flex-grow-1 me-3 mb-0" role="search">
                <div class="input-group-append flex-grow-1">
                    <div class="input-group">
                        <input class="form-control " type="search" placeholder="Cerca" name="search" value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
                        <button class="btn btn-secondary border-0">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- ADD BUTTON -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-question-modal">
                <i class="fa-solid fa-plus me-md-2"></i>
                <span class="d-none d-md-inline">Aggiungi un nuovo questionario</span>
            </button>

            <!-- ADD BUTTON MODAL -->
            <div class="modal fade" id="add-question-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
                <div class="modal-dialog modal-xl">
                    <form action="/admin/questionario/create" method="POST" class="needs-validation">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="add-question">Aggiungi un nuovo questionario</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <!-- MODAL BODY -->
                            <div class="modal-body row g-3">
                            </div>
                            <!-- BUTTONS -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ANNULLA</button>
                                <button type="submit" class="btn btn-primary" name="question-create">AGGIUNGI</button>
                            </div>
                    </form>
                </div>
            </div>
        </header>

        <?php if (empty($questions)) : ?>
            <div class="alert alert-primary mb-0" role="alert">
                <i class="fa-solid fa-circle-info me-2"></i>
                Nessun questionario trovato
            </div>
        <?php else : ?>

            <?php foreach ($questions as $question) : ?>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title"><?= $question['question'] ?></h5>
                            <a href="/admin/questionari?id=<?= $question['id'] ?>" class="btn btn-outline-success border-0 no-hover">
                                <i class="fa-solid fa-pen me-2"></i>
                                Modifica
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        <?php endif ?>
    </div>
<?php endif ?>