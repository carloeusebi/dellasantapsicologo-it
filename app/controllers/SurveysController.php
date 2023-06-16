<?php

namespace app\controllers;

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
        $admin = new Controller($page);

        $admin::$model = self::MODEL;

        $admin->get();

        if (isset($admin->gotById['survey'])) {
            $surveys = json_decode($admin->gotById['survey']);
        }
        $admin->addToParams('surveys', $surveys);

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
}
