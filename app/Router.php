<?php

namespace app;

require 'controllers/Controller.php';

class Router
{
    public $routes;

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
            require __DIR__ . '/views/404.view.php';
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

        if ($page === '/') $page = 'home';

        ob_start();

        include_once(__DIR__ . "/views/$page.view.php");

        $content = ob_get_clean();

        include_once(__DIR__ . "/views/layouts/$layout.php");
    }

    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');
        if (!$position) {
            return $path;
        }
        return substr($path, 0, $position);
    }

    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}
