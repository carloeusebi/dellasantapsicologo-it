<?php

namespace app;


class Router
{
    private $routes;

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->getPath();
        $method = $this->getMethod();

        $callback = $this->routes[$method][$path] ?? false;

        if (!$callback) {

            http_response_code('404');

            $this->renderView('404');

            exit();
        }

        call_user_func($callback, $this, $path);
    }

    public function renderView($page, $params = [])
    {
        $layout = isset($params['layout']) ? $params['layout'] : 'main';

        foreach ($params as $param => $value) {
            $$param = $value;
        }

        $page = ($page === '/') ? '/home' : $page;

        $pageTitle = $this->getPageTitle($page);

        ob_start();

        include_once(__DIR__ . "/views/$page.view.php");

        $content = ob_get_clean();

        include_once(__DIR__ . "/views/layouts/$layout.php");
    }

    public function getPath()
    {
        return parse_url($_SERVER['REQUEST_URI'])['path'];
    }

    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    private function getPageTitle($page)
    {
        return match ($page) {
            '/home' => 'Home',
            '/chi-sono' => 'Chi Sono',
            '/cosa-aspettarsi' => 'Cosa Aspettarsi dalla Terapia',
            '/di-cosa-mi-occupo' => 'Di cosa mi Occupo',
            '/contatti' => 'Contatti',
            default => 'Pagina non trovata'
        };
    }

    public function urlIs($value)
    {
        return $_SERVER['REQUEST_URI'] === $value;
    }
}
