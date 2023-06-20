<?php

require_once "../vendor/autoload.php";

use app\App;
use app\controllers\Controller;
use app\controllers\SiteController;
use app\controllers\AdminController;
use app\controllers\PatientsController;
use app\controllers\QuestionsController;
use app\controllers\SurveysController;
use app\controllers\TestsController;

$app = new App();

$app->router->get('/', [SiteController::class, 'getPage']);
$app->router->get('/chi-sono', [SiteController::class, 'getPage']);
$app->router->get('/cosa-aspettarsi', [SiteController::class, 'getPage']);
$app->router->get('/di-cosa-mi-occupo', [SiteController::class, 'getPage']);
$app->router->get('/contatti', [SiteController::class, 'getPage']);

$app->router->get('/admin', [AdminController::class, 'index']);
$app->router->get('/login', [AdminController::class, 'login']);
$app->router->get('/logout', [AdminController::class, 'login']);

$app->router->get('/admin/pazienti', [PatientsController::class, 'index']);
$app->router->get('/admin/pazienti', [PatientsController::class, 'index']);

$app->router->get('/admin/sondaggi', [SurveysController::class, 'index']);
$app->router->get('/admin/sondaggi/crea', [SurveysController::class, 'index']);

$app->router->get('/admin/questionari', [QuestionsController::class, 'index']);

$app->router->get('/test', [TestsController::class, 'index']);

// GET
//-----------------------------------------------------------------------------------------------------
// POST

$app->router->post('/', [SiteController::class, 'post']);
$app->router->post('/chi-sono', [SiteController::class, 'post']);
$app->router->post('/cosa-aspettarsi', [SiteController::class, 'post']);
$app->router->post('/di-cosa-mi-occupo', [SiteController::class, 'post']);
$app->router->post('/contatti', [SiteController::class, 'post']);

$app->router->post('/admin', [AdminController::class, 'index']);

$app->router->post('/login', [AdminController::class, 'login']);
$app->router->post('/logout', [AdminController::class, 'logout']);

$app->router->post('/admin/pazienti', [PatientsController::class, 'index']);
$app->router->post('/admin/pazienti/create', [PatientsController::class, 'save']);
$app->router->post('/admin/pazienti/update', [PatientsController::class, 'save']);
$app->router->post('/admin/pazienti/delete', [PatientsController::class, 'delete']);

$app->router->post('/admin/sondaggi', [SurveysController::class, 'index']);
$app->router->post('/admin/sondaggi/crea', [SurveysController::class, 'save']);
$app->router->post('/admin/sondaggi/delete', [SurveysController::class, 'delete']);

$app->router->post('/admin/questionari', [QuestionsController::class, 'index']);
$app->router->post('/admin/questionari/create', [QuestionsController::class, 'save']);
$app->router->post('/admin/questionari/update', [QuestionsController::class, 'save']);
$app->router->post('/admin/questionari/delete', [QuestionsController::class, 'delete']);

$app->router->post('/test/login', [TestsController::class, 'login']);
$app->router->post('/test/logout', [TestsController::class, 'logout']);

$app->run();


function dd($value)
{

    echo '<pre>';
    var_dump($value);
    echo '</pre>';

    die();
}
