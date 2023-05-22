<?php

session_start();

require "../Router.php";

use root\Router;

$router = new Router();

$router->loadController();
