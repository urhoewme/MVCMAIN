<?php

require_once '../vendor/autoload.php';

$seeder = new \app\system\database\seeders\UserSeeder();
$seeder->run();