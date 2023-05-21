<?php

function statsFormUpdate($stat, $e = '')
{
    $filePath = '../stats/stats-form.txt';
    $lines = file($filePath);

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
