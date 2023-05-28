<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="author" content="Carlo Eusebi">
    <meta name="description" content="Psicologo Cognitivo Comportamentale, mi occupo di consulenze psicologiche, sostegno e propongo percorsi individualizzati a Fano e online. Prenota la tua consulenza.">
    <title>Dellasanta Psicologo Fano | Admin</title>
    <link rel="icon" href="img/Favicon.png" type="image/png">
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>

    <?php if (!isset($_SESSION['login'])) : ?>

        <!-- LOGIN -->
        <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <img class="mx-auto h-15 w-auto" src="img/Favicon.png" alt="Your Company">
                <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your account</h2>
            </div>

            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-6 mb-6" method="POST">
                    <div>
                        <label for="usuername" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
                        <div class="mt-2">
                            <input id="text" name="username" type="username" autocomplete="username" required class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#6ecc84] sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                        </div>
                        <div class="mt-2">
                            <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#6ecc84] sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div>
                        <button type="submit" name="login" class="flex w-full justify-center rounded-md bg-[#6ecc84] hover:bg-[#264e32] px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
                    </div>
                </form>

                <?php if ($isInvalid) : ?>
                    <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                        <p class="font-bold">Attenzione</p>
                        <p>Username o Password non validi</p>
                    </div>
                <?php endif ?>

            </div>
        </div>
    <?php elseif ($_SESSION['login'] === true) : ?>
        <form method="POST">
            <div>
                <button type="submit" name="logout" class="flex w-full justify-center rounded-md bg-[#6ecc84] hover:bg-[#264e32] px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Logout</button>
            </div>
        </form>
    <?php endif ?>

</body>

</html>