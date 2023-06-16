<?php $patient = app\App::$app->patient->getById($element['patient_id']); ?>
<h1 class="mt-5">sono il sondaggio di <?= $patient['fname'] . ' ' . $patient['lname'] ?></h1>