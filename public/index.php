<?php

require_once "../vendor/autoload.php";

use app\App;
use app\controllers\SiteController;
use app\controllers\Controller;
use app\controllers\PatientsController;
use app\controllers\QuestionsController;

$app = new App();

$app->router->get('/', [SiteController::class, 'getPage']);
$app->router->get('/chi-sono', [SiteController::class, 'getPage']);
$app->router->get('/cosa-aspettarsi', [SiteController::class, 'getPage']);
$app->router->get('/di-cosa-mi-occupo', [SiteController::class, 'getPage']);
$app->router->get('/contatti', [SiteController::class, 'getPage']);

$app->router->get('/admin', [Controller::class, 'index']);

$app->router->get('/admin/pazienti', [PatientsController::class, 'index']);
$app->router->get('/admin/pazienti', [PatientsController::class, 'index']);

$app->router->get('/admin/sondaggi', [Controller::class, 'index']);
$app->router->get('/admin/questionari', [QuestionsController::class, 'index']);

// GET
//-----------------------------------------------------------------------------------------------------
// POST

$app->router->post('/', [SiteController::class, 'post']);
$app->router->post('/chi-sono', [SiteController::class, 'post']);
$app->router->post('/cosa-aspettarsi', [SiteController::class, 'post']);
$app->router->post('/di-cosa-mi-occupo', [SiteController::class, 'post']);
$app->router->post('/contatti', [SiteController::class, 'post']);

$app->router->post('/admin', [Controller::class, 'index']);

$app->router->post('/login', [Controller::class, 'login']);
$app->router->post('/logout', [Controller::class, 'logout']);

$app->router->post('/admin/pazienti', [PatientsController::class, 'index']);
$app->router->post('/admin/pazienti/create', [PatientsController::class, 'create']);
$app->router->post('/admin/pazienti/update', [PatientsController::class, 'update']);
$app->router->post('/admin/pazienti/delete', [PatientsController::class, 'delete']);

$app->router->post('/admin/sondaggi', [Controller::class, 'index']);
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
