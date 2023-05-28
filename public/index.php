<?php

session_start();

require_once "../vendor/autoload.php";
require "../app/functions.php";

use app\Router;
use app\controllers\Controller;

$router = new Router();

$router->get('/', [Controller::class, 'loadPage']);
$router->get('/chi-sono', [Controller::class, 'loadPage']);
$router->get('/cosa-aspettarsi', [Controller::class, 'loadPage']);
$router->get('/di-cosa-mi-occupo', [Controller::class, 'loadPage']);
$router->get('/contatti', [Controller::class, 'loadPage']);

$router->post('/', [Controller::class, 'send']);
$router->post('/chi-sono', [Controller::class, 'send']);
$router->post('/cosa-aspettarsi', [Controller::class, 'send']);
$router->post('/di-cosa-mi-occupo', [Controller::class, 'send']);
$router->post('/contatti', [Controller::class, 'send']);

$router->resolve();
