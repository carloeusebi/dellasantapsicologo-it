<?php

namespace Public;

class Router
{
    private function getUrl()
    {
        $uri = $_SERVER['REQUEST_URI'];

        $parsedUri = parse_url($uri);

        if ($parsedUri['path'] === '/') : $request = '/home';
        else : $request = $parsedUri['path'];
        endif;

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
        $controller = "../app/controllers{$request}.php";
        (file_exists($controller)) ? require $controller : $this->abort();
    }

    public function loadController()
    {
        $url = $this->getUrl();
        $this->routeToController($url);
    }
}
