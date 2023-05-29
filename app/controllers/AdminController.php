<?php

namespace app\controllers;

use app\Router;
use app\config\Config;

class AdminController
{
    public static function admin(Router $router)
    {
        $isInvalid = false;

        $admin = new self();

        if ($router->getMethod() === "post") {

            if (isset($_POST['logout'])) $admin->logout();
            elseif (isset($_POST['login'])) $isInvalid = $admin->login();
        }

        $router->renderView('admin', ['layout' => 'admin', 'isInvalid' => $isInvalid]);
    }

    private function logout()
    {
        $_SESSION = array();

        session_destroy();

        header("Location: /admin");

        exit();
    }

    private function login()
    {
        $isInvalid = false;

        $username = $_POST["username"];
        $password = $_POST["password"];

        if ($username === Config::$adminUsername && $password === Config::$adminPassword) {

            $_SESSION['login'] = true;
        } else {

            $isInvalid = true;
        }

        return $isInvalid;
    }
}
