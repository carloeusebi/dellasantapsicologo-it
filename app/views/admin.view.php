<nav class="navbar navbar-expand-lg bg-body-tertiary mb-5">
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

<main>
    <div class="container">

        <div class="d-flex justify-content-end mb-5">

            <!-- ADD BUTTON -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-modal">
                <i class="fa-solid fa-plus me-2"></i>Aggiungi una nuova domanda
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
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1">
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

        </div>



        <!-- TABLE -->
        <?php foreach ($questions as $question) : ?>

            <div class="card mb-5">
                <div class="card-body">
                    <div class="d-flex justify-content-between">

                        <h5 class="card-title"><?= $question['id'] ?>. <?= $question['question'] ?></h5>

                        <!-- DELETE BUTTON -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-modal<?= $question['id'] ?>">
                            Elimina Domanda
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
                            <input type="text" id="question-<?= $question['id'] ?>" name="question-<?= $question['id'] ?>" value="<?= $question['question'] ?>" class="form-control">
                        </div>
                        <div class="col-12 col-md-4">
                            <label for=" select-<?= $question['id'] ?>">Tipo della risposta:</label>
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
                            <button class="btn btn-secondary mb-3">
                                <i class="fa-solid fa-plus me-2"></i> Aggiungi risposte
                            </button>
                        </div>
                        <?php foreach ($answers as $answer) : ?>
                            <div class="mb-2 d-flex">
                                <input type="email" class="form-control p-1 me-1" value="<?= $answer ?>">
                                <button class="btn btn-outline-danger border-0">
                                    <i class="fa-solid fa-trash-can fa-xs"></i>
                                </button>
                            </div>
                        <?php endforeach ?>
                    <?php endif ?>
                </div>
                <div class="d-flex justify-content-end me-3 mb-3">
                    <button class="btn btn-primary col-3">Salva</button>
                </div>
            </div>
        <?php endforeach ?>

    </div>
</main>