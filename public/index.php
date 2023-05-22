<?php

session_start();

require "Router.php";

use public\Router;

$router = new Router();

$router->loadController();
