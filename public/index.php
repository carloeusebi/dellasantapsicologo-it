<?php

session_start();

require_once "../vendor/autoload.php";
require "../app/Router.php";
require "../app/functions.php";

use app\Router;
use app\Controllers\Controller;

$router = new Router();

$router->get('/', 'home');
$router->get('/chi-sono', 'chi-sono');
$router->get('/cosa-aspettarsi', 'cosa-aspettarsi');
$router->get('/di-cosa-mi-occupo', 'di-cosa-mi-occupo');
$router->get('/contatti', 'contatti');

$router->resolve();
