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
        $admin = new parent($page);

        parent::$model = self::MODEL;

        $admin->get();

        $admin->renderPage();
    }


    public static function create()
    {
        parent::$notFound = self::NOT_FOUND;
        parent::$created = self::CREATED;
        parent::$model = self::MODEL;
        parent::$header = self::HEADER;

        parent::create();
    }


    public static function update()
    {
        parent::$updated = self::UPDATED;
        parent::$notFound = self::NOT_FOUND;
        parent::$model = self::MODEL;
        parent::$header = self::HEADER;

        parent::update();
    }


    public static function delete()
    {
        parent::$deleted = self::DELETED;
        parent::$notFound = self::NOT_FOUND;
        parent::$model = self::MODEL;
        parent::$header = self::HEADER;

        parent::delete();
    }
}
