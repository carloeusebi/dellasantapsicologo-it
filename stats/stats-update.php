<?php

function statsFormInitialize($filePath)
{
    fopen($filePath, 'a+');

    $lines = file($filePath);

    $date = date("d-m-y H:i:s ", time());

    $lines[0] = "# Last update: $date; 1st row: email successfully sent; 2nd row: form submitted with honeybox checked; 3rd row: submitted with undeliverable email; 4th row: errors while sending an email" . PHP_EOL;

    $lines[1] = $lines[1] ?? '0' . PHP_EOL;
    $lines[2] = $lines[2] ?? '0' . PHP_EOL;
    $lines[3] = $lines[3] ?? '0' . PHP_EOL;
    $lines[4] = $lines[4] ?? '0' . PHP_EOL;

    return $lines;
}

function statsFormUpdate($stat, $e = '')
{
    $filePath = '../stats/stats-form.txt';

    $lines = statsFormInitialize($filePath);

    switch ($stat) {

            // email succefully sent
        case 1:
            $lines[1] = intval($lines[1]) + 1 . PHP_EOL;
            break;

            // form submitted with honeybox checked
        case 2:
            $lines[2] = strval(intval($lines[2])) + 1 . PHP_EOL;
            break;

            // form submitted with undeliverable email
        case 3:
            $lines[3] = strval(intval($lines[3])) + 1 . PHP_EOL;
            break;

            //errors while sending an email
        case 4:
            $lines[4] = strval(intval($lines[4])) + 1 . PHP_EOL;
            //print error
            $lines[] = $e . PHP_EOL;
            break;

        default:
            break;
    }

    file_put_contents($filePath, implode('', $lines));
}
