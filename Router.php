<?php

namespace App;

require "app/controllers/Controller.php";

use app\Controllers\Controller;

class Router
{
    private function getUrl()
    {
        $uri = $_SERVER['REQUEST_URI'];

        $parsedUri = str_replace('/', '', parse_url($uri));

        $request = ($parsedUri['path'] === '') ? 'home' : $parsedUri['path'];

        return $request;
    }

    private function abort($code = 404)
    {
        http_response_code($code);

        require "app/views/{$code}.php";

        die();
    }

    private function routeToController($request)
    {
        $path = "../app/controllers/{$request}.php";
        if (!file_exists($path)) {
            $this->abort();
        }
        $controller = new Controller;

        $controller->renderView($request);
    }

    public function loadController()
    {
        $url = $this->getUrl();
        $this->routeToController($url);
    }
}
