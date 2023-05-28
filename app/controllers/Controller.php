<?php

namespace App\Controllers;

use App\Router;

class Controller
{

    public static function loadPage(Router $router, $page)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'GET') $router->renderView('404');

        $self = new self();
        $pageTitle = $self->getPageTitle($page);

        $router->renderView($page, $pageTitle);
    }

    public static function send(Router $router)
    {
        dd($_POST);
    }

    public function getPageTitle($page)
    {
        $pageTitle = match ($page) {
            '/' => 'Home',
            '/chi-sono' => 'Chi Sono',
            '/cosa-aspettarsi' => 'Cosa Aspettarsi dalla Terapia',
            '/di-cosa-mi-occupo' => 'Di cosa mi Occupo',
            '/contatti' => 'Contatti',
            default => '404',
        };

        return $pageTitle;
    }
}
