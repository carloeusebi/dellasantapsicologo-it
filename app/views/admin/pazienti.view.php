<div class="container">

    <?php if (isset($_GET['success'])) : ?>
        <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
            Paziente <strong><?= $_GET['success'] ?></strong> con successo
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>

    <!-- HEADER -->
    <header class="d-flex justify-content-between my-5">

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
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-patient-modal">
            <i class="fa-solid fa-plus me-md-2"></i>
            <span class="d-none d-md-inline">Aggiungi un nuovo paziente</span>
        </button>

        <!-- ADD BUTTON MODAL -->
        <div class="modal fade" id="add-patient-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
            <div class="modal-dialog">
                <form action="" method="POST" class="needs-validation" novalidate>
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
</div>
<!-- END OF MODAL -->

</header>

</div>