    <div class="container">

        <header class="d-flex justify-content-between align-items-center my-5">

            <!-- BACK -->
            <a href="<?= app\App::$app->router->getPreviousPage() ?>" class="btn btn-secondary me-3">
                <i class="fa-solid fa-circle-chevron-left me-md-2"></i>
                <span class="d-none d-md-inline">Indietro</span>
            </a>

        </header>

        <form id="survey-form" action="/admin/sondaggi/crea" method="POST">

            <!-- TITLE -->
            <div class="mb-3">
                <label for="title" class="form-label h4">Titolo del sondaggio:</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>


            <!-- SELECT PATIENT -->
            <?php if (isset($_GET['patient-id'])) : ?>

                <div class="d-flex align-items-center mb-3">
                    <p class="m-0 me-2">Sondaggio per:</p>
                    <a class="h3 d-block m-0" href="/admin/pazienti?id=<?= $patient['id'] ?>">
                        <?= $patient['fname'] . ' ' . $patient['lname'] ?>
                    </a>
                </div>
                <input type="hidden" id="patient_id" name="patient_id" value="<?= $patient['id'] ?>">
                <div class="invalid-feedback d-none text-end" id="patient_id-error">
                    Devi selezionare un paziente per procedere!
                </div>

            <?php else : ?>

                <label for="patient_id">Seleziona un paziente</label>
                <!-- select -->
                <select class="form-select mb-3" name="patient_id" id="patient_id" required>
                    <option selected disabled value=''>Scegli un paziente</option>

                    <?php foreach ($patients as $patient) : ?>
                        <option value="<?= $patient['id'] ?>"><?= $patient['fname'] . ' ' . $patient['lname'] ?></option>
                    <?php endforeach ?>

                </select>
                <div class="invalid-feedback d-none text-end" id="patient_id-error">
                    Devi selezionare un paziente per procedere!
                </div>

            <?php endif ?>

            <p class="h5">Seleziona i questionari da inserire nel sondaggio:</p>

            <!-- SELECT/DESELECT ALL -->
            <div class="d-flex mb-3">
                <button type="button" id="select-all" class="btn border-0 btn-outline-primary no-hover">Seleziona tutti</button>
                <button type="button" id="deselect-all" class="btn border-0 btn-outline-secondary no-hover">Deseleziona tutti</button>
            </div>

            <!-- QUESTIONS -->

            <div class="drag-container">

                <?php if (empty($questions)) : ?>
                    <div class="alert alert-primary mb-0" role="alert">
                        <i class="fa-solid fa-circle-info me-md-2"></i>
                        Nessun questionario trovato
                    </div>
                <?php else : ?>

                    <?php foreach ($questions as $question) : ?>
                        <!-- QUESTION -->

                        <div class="d-flex align-items-center user-select-none draggable justify-content-between justify-content-lg-start add-survey-question" draggable="true">
                            <input type="checkbox" class="form-check-input flex-shrink-0" name="checkboxes[]>" value="<?= $question['id'] ?>" id="question-<?= $question['id'] ?>">
                            <label for="question-<?= $question['id'] ?>" class="h5 ms-2 mb-0 text-start flex-grow-1"><?= $question['question'] ?></label>
                            <a href="/admin/questionari?id=<?= $question['id'] ?>" class="btn border-0 btn-outline-primary no-hover"><i class="fa-regular fa-eye"></i></a>

                            <input type="hidden" name="questions[<?= $question['id'] ?>][id]" value="<?= $question['id'] ?>">
                            <input type="hidden" name="questions[<?= $question['id'] ?>][question]" value="<?= $question['question'] ?>">
                            <input type="hidden" name="questions[<?= $question['id'] ?>][description]" value="<?= $question['description'] ?>">
                            <input type="hidden" name="questions[<?= $question['id'] ?>][type]" value="<?= $question['type'] ?>">
                            <input type="hidden" name="questions[<?= $question['id'] ?>][answers]" value="<?= $question['answers'] ?>">
                            <input type="hidden" name="questions[<?= $question['id'] ?>][legend]" value="<?= $question['legend'] ?>">
                        </div>

                    <?php endforeach ?>
                <?php endif ?>
            </div>
            <!-- SUBMIT BUTTON -->
            <div class=" text-end">
                <button type="submit" class="btn btn-success mt-3">
                    <i class="fa-solid fa-plus me-2"></i>
                    <span>Crea nuovo sondaggio</span>
                </button>
            </div>
        </form>
    </div>

    <script src="/js/survey-create.js"></script>
    <script src="/js/dragndrop.js"></script>