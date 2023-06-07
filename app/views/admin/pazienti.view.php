<?php if (isset($_GET['id'])) :
    require_once __DIR__ . '/patient.php'; ?>
<?php else : ?>
    <div class="container">


        <!-- HEADER -->
        <header class="d-flex justify-content-between my-5">

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
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-patient-modal">
                <i class="fa-solid fa-plus me-md-2"></i>
                <span class="d-none d-md-inline">Aggiungi un nuovo paziente</span>
            </button>

            <!-- ADD BUTTON MODAL -->
            <div class="modal fade" id="add-patient-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
                <div class="modal-dialog modal-xl">
                    <form action="/admin/pazienti/create" method="POST" class="needs-validation">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="add-question">Aggiungi un nuovo paziente</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <!-- MODAL BODY -->
                            <div class="modal-body row g-3">

                                <?php include __DIR__ . '/../components/patient-form.php'; ?>

                            </div>
                            <!-- BUTTONS -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ANNULLA</button>
                                <button type="submit" class="btn btn-primary" name="patient-create">AGGIUNGI</button>
                            </div>
                    </form>
                </div>
            </div>
        </header>
        <!-- END OF MODAL -->


        <!-- PATIENTS -->
        <div class="card p-3">

            <?php if (empty($patients)) : ?>
                <div class="alert alert-primary mb-0" role="alert">
                    <i class="fa-solid fa-circle-info me-2"></i>
                    Nessun paziente trovato
                </div>
            <?php else : ?>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <!-- FIRST NAME -->
                            <th scope="col">
                                <form class="w-100" action="" method="GET">
                                    <input type="hidden" name="search" value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
                                    <button type="submit" class="btn w-100 no-hover text-start border-0 p-0">
                                        <input type="hidden" name="order" value="fname">
                                        <input type="hidden" name="type" value="asc">
                                        <strong>Nome</strong>
                                        <i class="fa-solid fa-chevron-up ms-2 invisible"></i>
                                    </button>
                                </form>
                            </th>
                            <!-- LAST NAME -->
                            <th scope="col">
                                <form class="w-100" action="" method="GET">
                                    <input type="hidden" name="search" value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
                                    <button type="submit" class="btn w-100 no-hover text-start border-0 p-0">
                                        <input type="hidden" name="order" value="lname">
                                        <input type="hidden" name="type" value="asc">
                                        <strong>Cognome</strong>
                                        <i class="fa-solid fa-chevron-up ms-2 invisible"></i>
                                    </button>
                                </form>
                            </th>
                            <!-- AGE -->
                            <th scope="col" class="d-none d-md-table-cell">
                                <form class=" w-100" action="" method="GET">
                                    <input type="hidden" name="search" value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
                                    <button type="submit" class="btn w-100 no-hover text-start border-0 p-0">
                                        <input type="hidden" name="order" value="age">
                                        <input type="hidden" name="type" value="asc">
                                        <strong>Età</strong>
                                        <i class="fa-solid fa-chevron-up ms-2 invisible"></i>
                                    </button>
                                </form>
                            </th>
                            <!-- EMAIL -->
                            <th scope="col" class="d-none d-lg-table-cell">
                                <form class=" w-100" action="" method="GET">
                                    <input type="hidden" name="search" value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
                                    <button type="submit" class="btn w-100 no-hover text-start border-0 p-0">
                                        <input type="hidden" name="order" value="email">
                                        <input type="hidden" name="type" value="asc">
                                        <strong>Email</strong>
                                        <i class="fa-solid fa-chevron-up ms-2 invisible"></i>
                                    </button>
                                </form>
                            </th>
                            <!-- BEGIN -->
                            <th scope="col" class="d-none d-sm-table-cell">
                                <form class="w-100" action="" method="GET">
                                    <input type="hidden" name="search" value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
                                    <button type="submit" class="btn w-100 no-hover text-start border-0 p-0">
                                        <input type="hidden" name="order" value="begin">
                                        <input type="hidden" name="type" value="asc">
                                        <strong>Data di inizio</strong>
                                        <i class="fa-solid fa-chevron-up ms-2 invisible"></i>
                                    </button>
                                </form>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php foreach ($patients as $patient) : ?>
                            <tr class="clickable-row" data-href="/admin/pazienti?id=<?= $patient['id'] ?>">
                                <td><?= $patient['fname'] ?></td>
                                <td><?= $patient['lname'] ?></td>
                                <td class="d-none d-md-table-cell"><?= $patient['age'] ?></td>
                                <td class="d-none d-lg-table-cell"><?= $patient['email'] ?></td>
                                <td class="d-none d-sm-table-cell"><?= $patient['begin'] ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                <?php endif ?>
                </table>

        </div>
    <?php endif ?>

    </div>

    <script src="/js/patients.js"></script>