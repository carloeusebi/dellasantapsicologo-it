<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center my-5">
        <a href="/admin/pazienti" class="btn btn-outline-primary border-0 no-hover">
            <i class="fa-solid fa-circle-chevron-left me-md-2"></i>
            <span class="d-none d-md-inline">
                Indietro
            </span>
        </a>

        <div class="d-flex">


            <div>
                <!-- EDIT BUTTON -->
                <button type="button" class="btn btn-outline-secondary border-0 no-hover" data-bs-toggle="modal" data-bs-target="#edit-patient-modal">
                    <i class="fa-solid fa-pen me-2"></i>
                    Modifica
                </button>

                <!-- EDIT MODAL -->
                <div class="modal fade" id="edit-patient-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
                    <div class="modal-dialog modal-xl">
                        <form action="/admin/pazienti/update" method="POST" class="needs-validation">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="add-patient">Modifica <strong><?= $element['fname'] . ' ' . $element['lname'] ?></strong></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <!-- MODAL BODY -->
                                <div class="modal-body row g-3">

                                    <?php include __DIR__ . '/../components/patient-form.php'; ?>

                                </div>
                                <!-- BUTTONS -->
                                <div class="modal-footer">
                                    <input type="hidden" name="id" value="<?= $element['id'] ?>">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ANNULLA</button>
                                    <button type="submit" class="btn btn-primary" name="patient-update">MODIFICA</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>


            <!-- DELETE BUTTON -->
            <button class="btn btn-outline-danger border-0 no-hover" data-bs-toggle="modal" data-bs-target="#delete-patient-modal">
                <i class="fa-solid fa-trash-can me-2"></i>
                Elimina
            </button>

            <!-- DELTE MODAL -->
            <div class="modal fade" id="delete-patient-modal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="delete-patient-modal-Label">Conferma eliminazione</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Sei sicuro di voler eliminare <strong><?= $element['fname'] . ' ' . $element['lname'] ?></strong></p>
                        </div>
                        <!-- BUTTONS -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ANNULLA</button>
                            <form action="pazienti/delete" method="POST">
                                <input type="hidden" value="<?= $element['id'] ?>" name="id">
                                <button type="submit" class="btn btn-danger">ELIMINA</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<ul class="list-unstyled">
    <?php foreach ($labels as $key => $value) : ?>
        <li>
            <strong><?= $value ?>:</strong>
            <?= $element[$key] ?>
            <?php if ($key === 'weight' && $element[$key]) echo 'kg' ?>
            <?php if ($key === 'height' && $element[$key]) echo 'cm' ?>
        </li>
    <?php endforeach ?>
</ul>