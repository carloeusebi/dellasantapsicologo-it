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
        $admin = new Controller($page);

        $admin::$model = self::MODEL;

        $admin->get();

        $patientId = self::getPatientId($admin);

        if ($patientId) {
            $patientSurveys = self::getSurveys($patientId);
            $admin->addToParams('surveys', $patientSurveys);
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


    private static function getPatientId($admin)
    {
        return $admin->gotById['id'] ?? null;
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
}
