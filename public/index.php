<?php

session_start();

require_once "../vendor/autoload.php";
require "../Router.php";
require "../app/functions.php";

use app\Router;

$router = new Router();

$router->loadController();
