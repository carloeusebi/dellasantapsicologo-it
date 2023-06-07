<?php

namespace app\controllers;

use app\App;

class QuestionsController extends AdminController
{
    private const NOT_FOUND = 'Questionario non trovato';

    private const CREATED = 'Questionario creato con successo';
    private const UPDATED = 'Questionario modificato con successo';
    private const DELETED = 'Questionario cancellato con successo';

    private const HEADER = 'Location: /admin/questionari';

    private const MODEL = 'question';

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
