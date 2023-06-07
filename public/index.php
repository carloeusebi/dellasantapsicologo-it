<?php

require_once "../vendor/autoload.php";

use app\App;
use app\controllers\SiteController;
use app\controllers\AdminController;
use app\controllers\PatientsController;
use app\controllers\QuestionsController;

$app = new App();

$app->router->get('/', [SiteController::class, 'get']);
$app->router->get('/chi-sono', [SiteController::class, 'get']);
$app->router->get('/cosa-aspettarsi', [SiteController::class, 'get']);
$app->router->get('/di-cosa-mi-occupo', [SiteController::class, 'get']);
$app->router->get('/contatti', [SiteController::class, 'get']);

$app->router->get('/admin', [AdminController::class, 'index']);

$app->router->get('/admin/pazienti', [PatientsController::class, 'index']);
$app->router->get('/admin/pazienti', [PatientsController::class, 'index']);

$app->router->get('/admin/sondaggi', [QuestionsController::class, 'index']);
$app->router->get('/admin/questionari', [QuestionsController::class, 'index']);



$app->router->post('/', [SiteController::class, 'post']);
$app->router->post('/chi-sono', [SiteController::class, 'post']);
$app->router->post('/cosa-aspettarsi', [SiteController::class, 'post']);
$app->router->post('/di-cosa-mi-occupo', [SiteController::class, 'post']);
$app->router->post('/contatti', [SiteController::class, 'post']);

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
