<?php

require_once "../vendor/autoload.php";

use app\Router;
use app\controllers\Controller;
use app\controllers\AdminController;

$router = new Router();

$router->get('/', [Controller::class, 'loadPage']);
$router->get('/chi-sono', [Controller::class, 'loadPage']);
$router->get('/cosa-aspettarsi', [Controller::class, 'loadPage']);
$router->get('/di-cosa-mi-occupo', [Controller::class, 'loadPage']);
$router->get('/contatti', [Controller::class, 'loadPage']);
$router->get('/admin', [AdminController::class, 'index']);
$router->get('/admin/pazienti', [AdminController::class, 'index']);
$router->get('/admin/questionari', [AdminController::class, 'index']);
$router->get('/admin/paziente', [AdminController::class, 'index']);


$router->post('/', [Controller::class, 'sendMail']);
$router->post('/chi-sono', [Controller::class, 'sendMail']);
$router->post('/cosa-aspettarsi', [Controller::class, 'sendMail']);
$router->post('/di-cosa-mi-occupo', [Controller::class, 'sendMail']);
$router->post('/contatti', [Controller::class, 'sendMail']);
$router->post('/admin', [AdminController::class, 'index']);
$router->post('/admin/pazienti', [AdminController::class, 'index']);
$router->post('/admin/paziente', [AdminController::class, 'index']);
$router->post('/admin/paziente/delete', [AdminController::class, 'deletePatient']);

$router->resolve();


function dd($value)
{

    echo '<pre>';
    var_dump($value);
    echo '</pre>';

    die();
}
