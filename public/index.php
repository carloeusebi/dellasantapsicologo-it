<?php

require_once "../vendor/autoload.php";

use app\App;
use app\controllers\Controller;
use app\controllers\AdminController;
use app\controllers\PatientsController;
use app\controllers\QuestionsController;

$app = new App();

$app->router->get('/', [Controller::class, 'loadPage']);
$app->router->get('/chi-sono', [Controller::class, 'loadPage']);
$app->router->get('/cosa-aspettarsi', [Controller::class, 'loadPage']);
$app->router->get('/di-cosa-mi-occupo', [Controller::class, 'loadPage']);
$app->router->get('/contatti', [Controller::class, 'loadPage']);

$app->router->get('/admin', [AdminController::class, 'index']);

$app->router->get('/admin/pazienti', [PatientsController::class, 'index']);
$app->router->get('/admin/pazienti', [PatientsController::class, 'index']);

$app->router->get('/admin/sondaggi', [QuestionsController::class, 'index']);
$app->router->get('/admin/questionari', [QuestionsController::class, 'index']);



$app->router->post('/', [Controller::class, 'sendMail']);
$app->router->post('/chi-sono', [Controller::class, 'sendMail']);
$app->router->post('/cosa-aspettarsi', [Controller::class, 'sendMail']);
$app->router->post('/di-cosa-mi-occupo', [Controller::class, 'sendMail']);
$app->router->post('/contatti', [Controller::class, 'sendMail']);

$app->router->post('/admin', [AdminController::class, 'index']);

$app->router->post('/admin/pazienti', [PatientsController::class, 'index']);
$app->router->post('/admin/pazienti/create', [PatientsController::class, 'create']);
$app->router->post('/admin/pazienti/update', [PatientsController::class, 'update']);
$app->router->post('/admin/pazienti/delete', [PatientsController::class, 'delete']);

$app->router->post('/admin/sondaggi', [QuestionsController::class, 'index']);
$app->router->post('/admin/questionari', [QuestionsController::class, 'index']);
$app->router->post('/admin/questionari/create', [QuestionsController::class, 'create']);
$app->router->post('/admin/questionari/update', [QuestionsController::class, 'update']);
$app->router->post('/admin/questionari/delete', [QuestionsController::class, 'delete']);


$app->run();


function dd($value)
{

    echo '<pre>';
    var_dump($value);
    echo '</pre>';

    die();
}
