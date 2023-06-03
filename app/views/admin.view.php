<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <img class="logo me-4" src="img/Logo.webp" alt="logo">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
            </ul>
            <form method="POST">
                <div>
                    <button type="submit" name="logout" class="btn btn-danger">Esci</button>
                </div>
            </form>
        </div>
    </div>
</nav>

<main class="py-5">
    <div class="container">

        <!-- HEADER -->
        <header class="d-flex justify-content-between mb-5">

            <form class="d-flex flex-grow-1 me-3" role="search">
                <div class="input-group-append flex-grow-1">
                    <div class="input-group">
                        <input class="form-control " type="search" placeholder="Cerca" name="search">
                        <button class="btn btn-secondary border-0">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- ADD BUTTON -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-modal">
                <i class="fa-solid fa-plus me-md-2"></i>
                <span class="d-none d-md-inline">Aggiungi una nuova domanda</span>
            </button>

            <!-- ADD BUTTON MODAL -->
            <div class="modal fade" id="add-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="add-question">Aggiungi una nuova domanda</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <!-- MODAL BODY -->
                        <div class="modal-body">
                            <div class="col-12">
                                <label for="add-question-name">Testo della domanda</label>
                                <input type="text" id="add-question-name" name="add-question-name" value="" class="form-control mb-3">
                            </div>
                            <div class="col-12 col-md-4">
                                <label for="add-question-type">Tipo della risposta:</label>
                                <select class="form-select d-inline-block" id="add-question-type" name="add-question-type">
                                    <option value="select">Select</option>
                                    <option value="radio">Radio</option>
                                    <option value="check">Check</option>
                                    <option value="textarea">Textarea</option>
                                </select>
                            </div>
                        </div>
                        <!-- BUTTONS -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ANNULLA</button>
                            <button type="button" class="btn btn-primary">AGGIUNGI</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END OF MODAL -->

        </header>



        <!-- TABLE -->
        <?php foreach ($questions as $question) : ?>

            <div class="card mb-5">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">

                        <h5 class="card-title flex-grow-1 mb-0"><?= $question['id'] ?>. <?= $question['question'] ?></h5>

                        <!-- DELETE BUTTON -->

                        <button type="button" class="btn btn-outline-danger border-0 ms-1" data-bs-toggle="modal" data-bs-target="#delete-modal<?= $question['id'] ?>">
                            <i class="fa-solid fa-trash-can me-md-2"></i>
                            <span class="d-none d-md-inline">Elimina Domanda</span>
                        </button>

                        <!-- DELTE BUTTON MODAL -->
                        <div class="modal fade" id="delete-modal<?= $question['id'] ?>" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Sei sicuro?</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Sei sicuro di voler eliminare "<?= $question['question'] ?>"
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ANNULLA</button>
                                        <button type="button" class="btn btn-danger">ELIMINA</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END OF MODAL -->
                        <!-- END OF BUTTONS -->
                    </div>
                    <div class="mb-3 row">
                        <div class="col-12 col-md-8">
                            <label for="question-<?= $question['id'] ?>">Testo della domanda</label>
                            <input type="text" id="question-<?= $question['id'] ?>" name="question-<?= $question['id'] ?>" value="<?= $question['question'] ?>" class="form-control mb-3">
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="select-<?= $question['id'] ?>">Tipo della risposta:</label>
                            <select class="form-select d-inline-block" id="select-<?= $question['id'] ?>" name="select-<?= $question['id'] ?>">
                                <option value="select" <?= $question['type'] === 'select' ? 'selected' : '' ?>>Select</option>
                                <option value="radio" <?= $question['type'] === 'radio' ? 'selected' : '' ?>>Radio</option>
                                <option value="check"><?= $question['type'] === 'check' ? 'selected' : '' ?>Check</option>
                                <option value="textarea" <?= $question['type'] === 'textarea' ? 'selected' : '' ?>>Textarea</option>
                            </select>
                        </div>
                    </div>
                    <?php $answers = explode(',', $question['answers']); ?>
                    <?php if ($question['type'] !== 'textarea') : ?>
                        <div class="d-flex justify-content-between align-items-center">
                            <p>Risposte:</p>
                            <button class="btn btn-secondary rounded-0 mb-3">
                                <i class="fa-solid fa-plus me-2"></i> Aggiungi risposte
                            </button>
                        </div>
                        <?php foreach ($answers as $answer) : ?>
                            <div class="mb-2 d-flex align-items-center">
                                <input type="email" class="form-control p-1 me-1" value="<?= $answer ?>">
                                <button class="btn btn-outline-danger border-0 no-hover">
                                    <i class="fa-solid fa-trash-can fa-xs"></i>
                                </button>
                            </div>
                        <?php endforeach ?>
                    <?php endif ?>
                </div>
                <div class="d-flex justify-content-end me-3 mb-3">
                    <button class="btn btn-primary col-4 col-md-2 rounded-0">Salva</button>
                </div>
            </div>
        <?php endforeach ?>

    </div>
</main>