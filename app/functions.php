<?php

function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function dd($value)
{
    var_dump($value);
    die();
}

function updateLog($code, $error = '')
{
    $filePath = '../log.txt';

    fopen($filePath, 'a+');

    $date = date("d-m-y H:i:s", time());

    $message = match ($code) {
        1 => "An email was succesfully sent.",
        2 => "Form was submitted with honeybox checked.",
        3 => "Form was submitted with an undeliverable email.",
        4 => $error,
        default => "Something went unexpected.",
    };

    $message = $date . ' ' . $message . PHP_EOL;

    file_put_contents($filePath, $message, FILE_APPEND);
}
