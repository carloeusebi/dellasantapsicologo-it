<?php if (isset($_GET['id'])) :
    require_once __DIR__ . '/sondaggio.view.php'; ?>
<?php else : ?>

    <div class="container pt-5">

        <!-- HEADER -->
        <header class="mb-5">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Sondaggi</h1>
                <div>
                    <a class="btn btn-success me-2" href="sondaggi/crea">
                        <i class="fa-solid fa-plus me-md-2"></i>
                        <span class="d-none d-md-inline">Crea nuovo sondaggio</span>
                    </a>
                    <a href="/admin/questionari" class="btn btn-primary">
                        <i class="fa-solid fa-pen me-0 me-md-2"></i>
                        <span class="d-none d-md-inline">Modifica questionari</span>
                    </a>
                </div>
            </div>
        </header>

        <!-- TABLE -->
        <section id="surveys-table">

            <div class="card p-3">

                <?php if (empty($entries)) : ?>
                    <div class="alert alert-primary mb-0" role="alert">
                        <i class="fa-solid fa-circle-info me-2"></i>
                        Nessun sondaggio trovato
                    </div>

                <?php else : ?>

                    <table class="table table-hover">

                        <!-- TABLE HEAD -->

                        <thead>
                            <tr>
                                <!-- PATIENT NAME -->
                                <th scope="col">
                                    <form class="w-100" action="" method="GET">
                                        <button type="submit" class="btn w-100 no-hover border-0 p-0 d-flex align-items-center justify-content-center">
                                            <input type="hidden" name="order" value="lname">
                                            <input type="hidden" name="type" value="asc">
                                            <input type="hidden" name="join" value="patient">
                                            <strong>Paziente</strong>
                                            <i class="fa-solid fa-chevron-up ms-2 invisible"></i>
                                        </button>
                                    </form>
                                </th>
                                <!-- SURVEY NAME -->
                                <th scope="col">
                                    <form class="w-100" action="" method="GET">
                                        <button type="submit" class="btn w-100 no-hover border-0 p-0 d-flex align-items-center justify-content-center">
                                            <input type="hidden" name="order" value="title">
                                            <input type="hidden" name="type" value="asc">
                                            <strong>Titolo</strong>
                                            <i class="fa-solid fa-chevron-up ms-2 invisible"></i>
                                        </button>
                                    </form>
                                </th>
                                <!-- CREATED AT -->
                                <th scope="col">
                                    <form class="w-100" action="" method="GET">
                                        <button type="submit" class="btn w-100 no-hover border-0 p-0 d-flex align-items-center justify-content-center">
                                            <input type="hidden" name="order" value="created_at">
                                            <input type="hidden" name="type" value="asc">
                                            <strong>Creato</strong>
                                            <i class="fa-solid fa-chevron-up ms-2 invisible"></i>
                                        </button>
                                    </form>
                                </th>
                                <!-- LAST UPDATE -->
                                <th scope="col" class="d-none d-md-table-cell">
                                    <form class=" w-100" action="" method="GET">
                                        <button type="submit" class="btn w-100 no-hover border-0 p-0 d-flex align-items-center justify-content-center">
                                            <input type="hidden" name="order" value="last_update">
                                            <input type="hidden" name="type" value="asc">
                                            <strong>Ultima modifica</strong>
                                            <i class="fa-solid fa-chevron-up ms-2 invisible"></i>
                                        </button>
                                    </form>
                                </th>
                                <!-- COMPLETED -->
                                <th scope="col" class="d-none d-lg-table-cell">
                                    <form class=" w-100" action="" method="GET">
                                        <button type="submit" class="btn w-100 no-hover border-0 p-0 d-flex align-items-center justify-content-center">
                                            <input type="hidden" name="order" value="completed">
                                            <input type="hidden" name="type" value="asc">
                                            <strong>Completato</strong>
                                            <i class="fa-solid fa-chevron-up ms-2 invisible"></i>
                                        </button>
                                    </form>
                                </th>
                            </tr>
                        </thead>

                        <!-- TABLE BODY -->
                        <tbody class="table-group-divider">

                            <?php foreach ($entries as $survey) : ?>
                                <?php $patient = app\App::$app->patient->getById($survey['patient_id']) ?>

                                <tr class="clickable-row" data-href="/admin/sondaggi?id=<?= $survey['id'] ?>">
                                    <td><?= $patient['fname'] . ' ' . $patient['lname'] ?></td>
                                    <td><?= $survey['title'] ?></td>
                                    <td><?= $survey['created_at'] ?></td>
                                    <td class="d-none d-md-table-cell"><?= $survey['last_update'] ?></td>
                                    <td class="d-none d-lg-table-cell"><?= $survey['completed'] ?></td>
                                </tr>
                            <?php endforeach ?>

                        </tbody>

                    <?php endif ?>
                    </table>

        </section>
    </div>
<?php endif ?>

<script src="/js/table.js"></script>