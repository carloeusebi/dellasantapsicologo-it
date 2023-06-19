<?php

namespace app\controllers;

use app\App;

class PatientsController extends AdminController
{
    protected const NOT_FOUND = 'Paziente non trovato';

    protected const CREATED = 'Paziente creato con successo';
    protected const UPDATED = 'Paziente modificato con successo';
    protected const DELETED = 'Paziente cancellato con successo';

    protected const HEADER = 'Location: /admin/pazienti';

    protected const MODEL = 'patient';


    public static function index($page)
    {
        $admin = new AdminController($page);

        $admin::$model = self::MODEL;

        $patientId = $admin->getId();

        if ($patientId) {
            $data = $admin->getById($patientId);

            if ($data) {
                foreach ($data as $key => $value) {
                    $admin->addToParams($key, $value);
                }
            } else {
                $admin::render404(self::NOT_FOUND);
            }

            $patientSurveys = self::getSurveys($patientId);
            $admin->addToParams('surveys', $patientSurveys);


            $admin->addToParams('isFilled', true);

            $labels = App::$app->patient->labels();
            $admin->addToParams('labels', $labels);
        } else {
            $admin->get();
        }

        self::refillForm($admin);

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

    public static function initController()
    {
        $admin = new AdminController();
        $admin::$created = self::CREATED;
        $admin::$updated = self::UPDATED;
        $admin::$deleted = self::DELETED;
        $admin::$model = self::MODEL;
        $admin::$header = self::HEADER;

        return $admin;
    }


    private static function getSurveys($id)
    {
        $allSurveys = App::$app->survey->get();
        $patientSurveys = [];

        foreach ($allSurveys as $survey) {
            if ($survey['patient_id'] == $id) {
                array_push($patientSurveys, $survey);
            }
        }

        return $patientSurveys;
    }

    private static function refillForm($admin)
    {
        $isFilled = false;

        $data = App::$app->session->getFlash('form');

        if ($data) {
            App::$app->session->remove('form');

            $isFilled = true;

            foreach ($data as $key => $value) {
                $admin->addToParams($key, $value);
            }
        }

        $admin->addToParams('isFilled', $isFilled);
    }
}
