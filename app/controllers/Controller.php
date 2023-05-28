<?php

namespace App\Controllers;

use App\Router;

use function GuzzleHttp\default_ca_bundle;

class Controller
{
    public function getPageTitle($page)
    {
        $pageTitle = match ($page) {
            'home' => 'Home',
            'chi-sono' => 'Chi Sono',
            'cosa-aspettarsi' => 'Cosa Aspettarsi dalla Terapia',
            'di-cosa-mi-occupo' => 'Di cosa mi Occupo',
            'contatti' => 'Contatti',
            default => '404',
        };

        return $pageTitle;
    }
}
