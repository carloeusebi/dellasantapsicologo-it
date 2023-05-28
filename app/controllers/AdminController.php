<?php

namespace app\controllers;

class AdminController
{
    public static function admin()
    {
        $isInvalid = false;

        $file = __DIR__ . '/../views/admin.view.php';

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (isset($_POST['logout'])) {
                $_SESSION = array();
                session_destroy();
                header("Location: /admin");
                exit();
            } else {
            }
            $username = $_POST["username"];
            $password = $_POST["password"];

            include __DIR__ . '/../config/config.php';

            if ($username === $adminUsername && $password === $adminPassword) {
                $_SESSION['login'] = true;
            } else {
                $isInvalid = true;
            }
        }

        require $file;
    }
}
