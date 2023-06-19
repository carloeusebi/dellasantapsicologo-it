<?php

namespace app\controllers;

class QuestionsController extends AdminController
{
    protected const NOT_FOUND = 'Questionario non trovato';

    protected const CREATED = 'Questionario creato con successo';
    protected const UPDATED = 'Questionario modificato con successo';
    protected const DELETED = 'Questionario cancellato con successo';

    protected const HEADER = 'Location: /admin/questionari';

    protected const MODEL = 'question';

    public static function index($page)
    {
        $admin = new AdminController($page);

        $admin::$model = self::MODEL;

        $id = $admin->getId();

        if ($id) {
            if (!$admin->getById($id)) {
                $admin::render404(self::NOT_FOUND);
            }
        } else {
            $admin->get();
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
}
