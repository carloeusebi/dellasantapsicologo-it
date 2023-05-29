<?php if (!isset($_SESSION['login'])) : ?>

    <!-- LOGIN -->
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-24 w-auto" src="img/Favicon.png" alt="Your Company">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Accedi al tuo account</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6 mb-6" method="POST">
                <div>
                    <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
                    <div class="mt-2">
                        <input id="username" name="username" type="text" autocomplete="email" required class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-[#6ecc84] sm:text-sm sm:leading-6">
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
                    <button type="submit" name="login" class="flex w-full justify-center rounded-md bg-[#6ecc84] hover:bg-[#264e32] px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Accedi</button>
                </div>
            </form>

            <a href="/" class="mb-6 flex w-full justify-center rounded-md bg-transparent border border-[#6ecc84] hover:bg-[#264e32] hover:border-[#264e32] px-3 py-1.5 text-sm font-semibold leading-6 text-[#6ecc84] hover:text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Torna alla homepage</a>

            <?php if ($isInvalid) : ?>
                <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                    <p class="font-bold">Attenzione</p>
                    <p>Username o Password non validi</p>
                </div>
            <?php endif ?>

        </div>
    </div>
<?php elseif ($_SESSION['login'] === true) : ?>

    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">

            <form method="POST">
                <div>
                    <button type="submit" name="logout" class="flex w-full justify-center rounded-md bg-[#6ecc84] hover:bg-[#264e32] px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Esci</button>
                </div>
            </form>

        </div>
    </div>

<?php endif ?>