    <div class="container">

        <header class="d-flex justify-content-between align-items-center my-5">

            <!-- BACK -->
            <a href="/admin/sondaggi" class="btn btn-secondary me-3">
                <i class="fa-solid fa-circle-chevron-left me-md-2"></i>
                <span class="d-none d-md-inline">Indietro</span>
            </a>

            <!-- SEARCHBAR -->
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

                <?php foreach ($entries as $question) : ?>
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex">
                                    <input type="checkbox" class="form-check-input me-3" name="questions[]>" data-id="<?= $question['id'] ?>">
                                    <h5 class="card-title"><?= $question['question'] ?></h5>
                                </div>
                                <a href="/admin/questionari?id=<?= $question['id'] ?>" class="btn btn-outline-success border-0 no-hover">
                                    <i class="fa-solid fa-pen me-2"></i>
                                    <span class="d-none d-md-inline">
                                        Modifica
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            <?php endif ?>
            <!-- SUBMIT BUTTON -->
            <div class="text-end">
                <button type="submit" class="btn btn-success">
                    <i class="fa-solid fa-plus me-md-2"></i>
                    <span class="d-none d-md-inline">Crea nuovo sondaggio</span>
                </button>
            </div>
        </form>
    </div>

    <script src="/js/create-survey.js"></script>