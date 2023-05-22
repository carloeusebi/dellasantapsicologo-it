<?php

namespace root\app\Controllers;

class Controller
{
    public function renderView($page)
    {
        require "$page.php";

        require "../app/views/layouts/head.php";
        if ($page !== 'home') {
            require "../app/views/layouts/hero-secondary.php";
        }

        if ($page === 'contatti') {
            require "../app/views/layouts/form.php";
            require "../app/views/$page.view.php";
        } else {
            require "../app/views/$page.view.php";
            require "../app/views/layouts/form.php";
        }

        require "../app/views/layouts/footer.php";
    }
}
