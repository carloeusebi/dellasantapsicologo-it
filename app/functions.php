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
