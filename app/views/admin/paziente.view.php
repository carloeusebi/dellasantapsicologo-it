<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mt-5">

        <h1>Sono

            <?php foreach ($patients as $patient) :
                if ($patient['id'] == $_GET['id']) :
                    echo $patient['fname'] . ' ' . $patient['lname'] . ' '; ?>
                    ed il mio username è <?= $patient['username'] ?>
                <?php endif ?>

            <?php endforeach ?>
        </h1>

        <div class="d-flex">
            <button class=" btn btn-outline-secondary border-0 no-hover">
                <i class="fa-solid fa-pen me-2"></i>
                Modifica
            </button>
            <!-- Button trigger modal -->
            <button class="btn btn-outline-danger border-0 no-hover" data-bs-toggle="modal" data-bs-target="#delete-patient-modal">
                <i class="fa-solid fa-trash-can me-2"></i>
                Elimina
            </button>

            <!-- Modal -->
            <div class="modal fade" id="delete-patient-modal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="delete-patient-modal-Label">Conferma eliminazione</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Sei sicuro di voler eliminare <strong><?= $patient['fname'] . ' ' . $patient['lname'] ?></strong></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ANNULLA</button>
                            <form action="paziente/delete" method="POST">
                                <input type="hidden" value="<?= $patient['id'] ?>" name="id">
                                <button type="submit" class="btn btn-danger">ELIMINA</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>