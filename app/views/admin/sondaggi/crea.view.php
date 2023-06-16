    <div class="container">

        <header class="d-flex justify-content-between align-items-center my-5">

            <!-- BACK -->
            <a href="/admin/sondaggi" class="btn btn-secondary me-3">
                <i class="fa-solid fa-circle-chevron-left me-md-2"></i>
                <span class="d-none d-md-inline">Indietro</span>
            </a>

            <!-- SEARCHBAR -->
            <!-- <form class="d-flex flex-grow-1 me-3 mb-0" role="search">
                <div class="input-group-append flex-grow-1">
                    <div class="input-group">
                        <input class="form-control " type="search" placeholder="Cerca" name="search" value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
                        <button class="btn btn-secondary border-0">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form> -->
        </header>

        <!-- SELECT PATIENT -->
        <form id="survey-form" action="">

            <?php if (isset($_GET['patient-id'])) : ?>

                <?php $id = $_GET['patient-id'];
                $patient = app\App::$app->patient->getById($id);
                ?>
                <div class="d-flex justify-content-between">
                    <p>Sondaggio per:</p>
                    <a class="h3 d-block" href="/admin/pazienti?id=<?= $id ?>">
                        <?= $patient['fname'] . ' ' . $patient['lname'] ?>
                    </a>
                </div>
                <input type="hidden" id="patient-select" name="patient-select" value="<?= $id ?>">
                <div class="invalid-feedback d-none text-end" id="patient-select-error">
                    Devi selezionare un paziente per procedere!
                </div>

            <?php else : ?>

                <?php
                $_GET['order'] = 'lname'; // to order by last name
                $patients = app\App::$app->patient->get();
                ?>


                <label for="patient-select">Seleziona un paziente</label>
                <!-- select -->
                <select class="form-select mb-3" name="patient-select" id="patient-select" required>
                    <option selected disabled value=''>Scegli un paziente</option>
                    <?php foreach ($patients as $patient) : ?>
                        <option value="<?= $patient['id'] ?>"><?= $patient['fname'] . ' ' . $patient['lname'] ?></option>
                    <?php endforeach ?>
                </select>
                <div class="invalid-feedback d-none text-end" id="patient-select-error">
                    Devi selezionare un paziente per procedere!
                </div>

            <?php endif ?>

            <!-- SELECT/DESELECT ALL -->
            <div class="d-flex mb-3">
                <button type="button" id="select-all" class="btn border-0 btn-outline-primary no-hover">Seleziona tutti</button>
                <button type="button" id="deselect-all" class="btn border-0 btn-outline-secondary no-hover">Deseleziona tutti</button>
            </div>

            <!-- QUESTIONS -->

            <?php if (empty($entries)) : ?>
                <div class="alert alert-primary mb-0" role="alert">
                    <i class="fa-solid fa-circle-info me-md-2"></i>
                    Nessun questionario trovato
                </div>
            <?php else : ?>

                <script>
                    const questionsData = [];
                    let entry;
                </script>

                <?php foreach ($entries as $question) : ?>
                    <!-- pass data to JS -->
                    <script>
                        entry = {
                            id: `<?= $question['id'] ?>`,
                            question: `<?= $question['question'] ?>`,
                            legend: `<?= $question['legend'] ?>`,
                            answers: `<?= $question['answers'] ?>`,
                            type: `<?= $question['type'] ?>`,
                            description: `<?= $question['description'] ?>`
                        }
                        questionsData.push(entry);
                    </script>

                    <!-- QUESTION -->

                    <div class="d-flex align-items-center user-select-none">
                        <input type="checkbox" class="form-check-input me-3" name="questions[]>" data-id="<?= $question['id'] ?>" id="question-<?= $question['id'] ?>">
                        <label for="question-<?= $question['id'] ?>" class="h5"><?= $question['question'] ?></label>
                        <a href="/admin/questionari?id=<?= $question['id'] ?>" class="btn border-0 btn-outline-primary no-hover"><i class="fa-regular fa-eye"></i></a>
                    </div>


                <?php endforeach ?>
            <?php endif ?>
            <!-- SUBMIT BUTTON -->
            <div class="text-end">
                <button type="submit" class="btn btn-success mt-3">
                    <i class="fa-solid fa-plus me-2"></i>
                    <span>Crea nuovo sondaggio</span>
                </button>
            </div>
        </form>
        <form action="/admin/sondaggi/crea" method="post" id="real-form" class="d-none"></form>
    </div>

    <script src="/js/survey-create.js"></script>