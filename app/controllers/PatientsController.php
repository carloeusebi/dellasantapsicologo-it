<?php

namespace app\controllers;

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

        $admin->renderPage();
    }

    public static function update()
    {
        $admin = self::initController();
        $admin->update();
    }

    public static function create()
    {
        $admin = self::initController();
        $admin->create();
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
