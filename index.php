<?php

$request = $_SERVER['REQUEST_URI'];

switch($request){
    case '/':
        require __DIR__.'/views/home.php';
        break;
    case '':
        require __DIR__.'/views/home.php';
        break;
    case '/chi-sono':
        require __DIR__.'/views/chi-sono.php';
        break;
    case '/cosa-aspettarsi':
        require __DIR__.'/views/cosa-aspettarsi.php';
        break;
    case '/di-cosa-mi-occupo':
        require __DIR__.'/views/di-cosa-mi-occupo.php';
        break;
    case '/contatti':
        require __DIR__.'/views/contatti.php';
        break;
    default:
        require __DIR__.'/views/404.php';
        break;
        
}

?>