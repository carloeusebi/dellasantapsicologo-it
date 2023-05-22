<?php

session_start();

require "../Router.php";
require "../app/functions.php";

use root\Router;

$router = new Router();

$router->loadController();
