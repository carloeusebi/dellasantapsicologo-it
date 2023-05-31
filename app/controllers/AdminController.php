<?php

namespace app\controllers;

use app\Router;
use app\config\Config;

class AdminController
{
    public static function admin(Router $router)
    {
        session_set_cookie_params(3600);

        session_start();

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
        session_start();

        session_destroy();

        header("Location: /admin");

        exit();
    }

    private function login()
    {
        $isInvalid = false;

        $username = $_POST["username"];
        $password = $_POST["password"];

        if ($username === Config::ADMIN_USERNAME && $password === Config::ADMIN_PASSWORD) {

            $_SESSION['login'] = true;
        } else {

            $isInvalid = true;
        }

        return $isInvalid;
    }
}
