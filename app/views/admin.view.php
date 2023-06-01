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

        <div class="d-flex justify-content-end mb-3">

            <!-- ADD BUTTON -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-modal">
                <i class="fa-solid fa-plus me-2"></i>Aggiungi una nuova domanda
            </button>

            <!-- ADD BUTTON MODAL -->
            <div class="modal fade" id="add-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="add-question">Aggiungi una nuova domanda</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <!-- MODAL BODY -->
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1">
                            </div>
                        </div>
                        <!-- BUTTONS -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ANNULLA</button>
                            <button type="button" class="btn btn-primary">AGGIUNGI</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END OF MODAL -->

        </div>



        <!-- TABLE -->
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
                                <!-- EDIT BUTTON -->
                                <button type="submit" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#edit-modal<?= $question['id'] ?>">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                                <!-- EDIT BUTTON MODAL -->
                                <div class="modal fade" id="edit-modal<?= $question['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="add-question">Modifica questa domanda</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <!-- MODAL BODY -->
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1" value="<?= $question['question'] ?>">
                                                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                                    <input type="text" class="form-control" id="exampleInputPassword1" value="<?= $question['test'] ?>">
                                                </div>
                                            </div>
                                            <!-- BUTTONS -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ANNULLA</button>
                                                <button type="button" class="btn btn-primary">MODIFICA</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END OF MODAL -->

                                <!-- DELETE BUTTON -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-modal<?= $question['id'] ?>">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>

                                <!-- DELTE BUTTON MODAL -->
                                <div class="modal fade" id="delete-modal<?= $question['id'] ?>" tabindex="-1">
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