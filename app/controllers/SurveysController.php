<?php

namespace app\controllers;

use app\App;

class SurveysController extends AdminController
{
    protected const NOT_FOUND = 'Sondaggio non trovato';

    protected const CREATED = 'Sondaggio creato con successo';
    protected const UPDATED = 'Sondaggio modificato con successo';
    protected const DELETED = 'Sondaggio cancellato con successo';

    protected const HEADER = 'Location: /admin/sondaggi';

    protected const MODEL = 'survey';


    public static function index($page)
    {
        $admin = new AdminController($page);

        $admin::$model = self::MODEL;

        $id = $admin->getId();

        if ($id) {
            $encodedSurvey = $admin->getById($id);

            if (!$encodedSurvey) {
                $admin::render404(self::NOT_FOUND);
            }

            $surveys = json_decode($encodedSurvey['survey']);
            $admin->addToParams('surveys', $surveys);
        } else {
            $admin->get();
        }

        $patientId = $_GET['patient-id'] ?? null;
        if ($patientId) {
            $patient = self::getPatient($patientId);
            $admin->addToParams('patient', $patient);
        }

        if (self::needQuestions()) {
            $questions = self::getQuestions();
            $admin->addToParams('questions', $questions);

            $patients = self::getPatients();
            $admin->addToParams('patients', $patients);
        }

        $admin->renderPage();
    }


    public static function save()
    {
        $admin = self::initController();
        $admin->save();
    }


    public static function delete()
    {
        $admin = self::initController();
        $admin->delete();
    }


    private static function initController()
    {
        $admin = new AdminController();
        $admin::$created = self::CREATED;
        $admin::$updated = self::UPDATED;
        $admin::$deleted = self::DELETED;
        $admin::$model = self::MODEL;
        $admin::$header = self::HEADER;

        return $admin;
    }

    private static function needQuestions()
    {
        return App::$app->router->getPath() === '/admin/sondaggi/crea';
    }

    private static function getQuestions()
    {
        App::$app->question->setOrder('question');
        return App::$app->question->get();
    }

    private static function getPatients()
    {
        App::$app->patient->setOrder('lname');
        return App::$app->patient->get();
    }

    private static function getPatient($id)
    {
        return App::$app->patient->getById($id);
    }
}
