<?php

namespace app\controllers;

use app\Router;
use app\config\Config;

class AdminController
{
    public static function admin(Router $router)
    {
        $isInvalid = false;

        if ($router->getMethod() === "post") {

            if (isset($_POST['logout'])) {

                $_SESSION = array();

                session_destroy();

                header("Location: /admin");

                exit();
            } elseif (isset($_POST['login'])) {
                $username = $_POST["username"];
                $password = $_POST["password"];

                if ($username === Config::$adminUsername && $password === Config::$adminPassword) {

                    $_SESSION['login'] = true;
                } else {

                    $isInvalid = true;
                }
            }
        }

        $router->renderView('admin', ['layout' => 'admin', 'isInvalid' => $isInvalid]);
    }
}
