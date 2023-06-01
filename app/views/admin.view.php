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
        <div class="card p-5">


            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">question</th>
                        <th scope="col">test</th>
                        <th scope="col">type</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($questions as $question) : ?>

                        <tr>
                            <td><?= $question['id'] ?></td>
                            <td><?= $question['question'] ?></td>
                            <td><?= $question['test'] ?></td>
                            <td><?= $question['type'] ?></td>
                            <td class="text-end">
                                <button type="submit" class="btn btn-outline-secondary">
                                    <i class="fa-solid fa-pen"></i>
                                </button>

                                <!-- DELETE BUTTON -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal<?= $question['id'] ?>">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>

                                <!-- DELTE BUTTON MODAL -->
                                <div class="modal fade" id="modal<?= $question['id'] ?>" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Sei sicuro di voler eliminare <?= $question['question'] ?>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ANNULLA</button>
                                                <button type="button" class="btn btn-danger">ELIMINA</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END OF MODAL -->

                            </td>
                        </tr>

                    <?php endforeach ?>

                </tbody>
            </table>

        </div>
    </div>
</main>