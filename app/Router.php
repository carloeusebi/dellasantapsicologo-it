<?php

namespace app;

class Router
{
    private $routes;
    private $layout;


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

        call_user_func($callback, $path);
    }


    public function renderView($page, $params = [])
    {
        foreach ($params as $param => $value) {
            $$param = $value;
        }

        ob_start();

        include_once(__DIR__ . "/views/$page.view.php");

        $content = ob_get_clean();

        include_once(__DIR__ . "/views/layouts/$this->layout.php");
    }


    public function setLayout($layout)
    {
        $this->layout = $layout;
    }


    public function getPath()
    {
        return parse_url($_SERVER['REQUEST_URI'])['path'];
    }


    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }


    public function isPost()
    {
        return $this->getMethod() === 'post';
    }


    public function isGet()
    {
        return $this->getMethod() === 'get';
    }


    public function getPreviousPage()
    {
        if (!isset($_SESSION['visitedPages'])) {
            $_SESSION['visitedPages'] = [];
            $_SESSION['parentReferer'] = $_SERVER['HTTP_REFERER'];
        } else {
            if (in_array($_SERVER['REQUEST_URI'], $_SESSION['visitedPages'], true)) {
                unset($_SESSION['visitedPages']);
                return $_SESSION['parentReferer'];
            }
        }

        array_push($_SESSION['visitedPages'], $_SERVER['REQUEST_URI']);
        return $_SERVER['HTTP_REFERER'];
    }


    public function urlIs($value)
    {
        return $_SERVER['REQUEST_URI'] === $value;
    }
}
