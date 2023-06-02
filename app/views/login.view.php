<div class="container">

    <div class="row justify-content-center align-items-center vh-100">

        <div class="col-10 col-md-8 col-lg-4">

            <figure class="text-center mb-5">
                <img src="img/Favicon.png" alt="logo">
            </figure>

            <h1 class="mb-5 h2 text-center">Accedi al tuo account</h1>

            <form method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Username</label>
                    <input type="email" class="form-control" id="email" name="username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-login d-block w-100 mb-3" name="login">Accedi</button>
                <a href="/" class="btn btn-home d-block w-100 mb-3">Torna alla homepage</a>
            </form>

            <?php if ($isInvalid) : ?>
                <div class="callout callout-danger d-flex align-items-center" role="alert">
                    <i class="fa-solid fa-triangle-exclamation me-3"></i>
                    <div>
                        Username o Password non validi
                    </div>
                </div>
            <?php endif ?>
        </div>


    </div>