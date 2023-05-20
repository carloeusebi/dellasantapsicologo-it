<?php

$uri = $_SERVER['REQUEST_URI'];

$request = parse_url($uri)['path'];

$routes = [
    '' => 'app/controllers/home.php',
    '/' => 'app/controllers/home.php',
    '/chi-sono' => 'app/controllers/chi-sono.php',
    '/cosa-aspettarsi' => 'app/controllers/cosa-aspettarsi.php',
    '/di-cosa-mi-occupo' => 'app/controllers/di-cosa-mi-occupo.php',
    '/contatti' => 'app/controllers/contatti.php',
    '/send-email' => 'app/email-send.php'
];

function routeToController($request, $routes)
{
    if (array_key_exists($request, $routes)) {

        require $routes[$request];
    } else {

        abort();
    }
}

function abort($code = 404)
{

    http_response_code($code);

    require "app/views/{$code}.php";

    die();
}

routeToController($request, $routes);
