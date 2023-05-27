<?php

namespace App\Controllers;

class Controller
{
    public function renderView($page)
    {
        $pageTitle = $this->getPageTitle($page);

        $this->includeFile('layouts/head', $pageTitle);

        if ($page !== 'home') {
            $this->includeFile('layouts/hero-secondary', $pageTitle);
        }

        if ($page === 'contatti') {
            $this->includeFile('layouts/form');
            $this->includeFile("$page.view");
        } else {
            $this->includeFile("$page.view");
            $this->includeFile('layouts/form');
        }

        $this->includeFile('layouts/footer');
    }

    private function includeFile($file, $pageTitle = '')
    {
        require "../app/views/$file.php";
    }

    private function getPageTitle($page)
    {
        $pageTitle = match ($page) {
            'home' => 'Home',
            'chi-sono' => 'Chi Sono',
            'cosa-aspettarsi' => 'Cosa Aspettarsi dalla Terapia',
            'di-cosa-mi-occupo' => 'Di cosa mi Occupo',
            'contatti' => 'Contatti',
        };

        return $pageTitle;
    }
}
