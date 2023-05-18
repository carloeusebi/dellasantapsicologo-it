<?php

$request = $_SERVER['REQUEST_URI'];

switch($request){
    case '/':
        require __DIR__.'/../app/views/home.php';
        break;
    case '':
        require __DIR__.'/../app/views/home.php';
        break;
    case '/chi-sono':
        require __DIR__.'/../app/views/chi-sono.php';
        break;
    case '/cosa-aspettarsi':
        require __DIR__.'/../app/views/cosa-aspettarsi.php';
        break;
    case '/di-cosa-mi-occupo':
        require __DIR__.'/../app/views/di-cosa-mi-occupo.php';
        break;
    case '/contatti':
        require __DIR__.'/../app/views/contatti.php';
        break;
    case '/email-send.php':
        require __DIR__.'/../app/email-send.php';
        break;
    default:
        require __DIR__.'/../app/views/404.php';
        break;
        
}

?>