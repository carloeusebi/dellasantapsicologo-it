<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Carlo Eusebi">
    <meta name="description" content="Psicologo Cognitivo Comportamentale, mi occupo di consulenze psicologiche, sostegno e propongo percorsi individualizzati a Fano e online. Prenota la tua consulenza.">
    <title>Dellasanta Psicologo | Admin</title>
    <link rel="icon" href="img/Favicon.png" type="image/png">
    <!-- fontawaseome -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css' integrity='sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==' crossorigin='anonymous'>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles/admin.css">
</head>

<body>

</body>

</html>
<div class="container">

    <div class="row justify-content-center align-items-center vh-100">

        <div class="col-10 col-md-8 col-lg-4">

            <figure class="text-center mb-5">
                <img src="/img/Favicon.png" alt="logo">
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