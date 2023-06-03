<div class="container">

    <?php if (isset($success) && $success) : ?>
        <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
            <i class="fa-solid fa-circle-check me-2"></i>Paziente <strong><?= isset($success) ? $success : '' ?></strong> con successo
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>

    <?php if (isset($errors) && $errors) : ?>
        <div class="alert alert-warning alert-dismissible fade show mt-5" role="alert">
            <p><strong><i class="fa-solid fa-triangle-exclamation me-2"></i>Ci sono stati uno o più errori:</strong></p>
            <?php foreach ($errors as $error) : ?>
                <p><?= $error ?></p>
            <?php endforeach; ?>
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
            <div class="modal-dialog modal-xl">
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

<!-- PATIENTS -->
<div class="card p-3">

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Cognome</th>
                <th scope="col" class="d-none d-md-table-cell">Età</th>
                <th scope="col" class="d-none d-md-table-cell">Email</th>
                <th scope="col">Data di inizio</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php foreach ($patients as $patient) : ?>
                <tr class="clickable-row" data-href="/admin/paziente?id=<?= $patient['id'] ?>">
                    <td><?= $patient['fname'] ?></td>
                    <td><?= $patient['lname'] ?></td>
                    <td class="d-none d-md-table-cell"><?= $patient['age'] ?></td>
                    <td class="d-none d-md-table-cell"><?= $patient['email'] ?></td>
                    <td><?= $patient['begin'] ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

</div>

</div>

<script>
    const rows = document.getElementsByClassName('clickable-row');

    for (let i = 0; i < rows.length; i++) {
        rows[i].addEventListener('click', () => {

            window.location = rows[i].getAttribute('data-href');
        })

    }
</script>