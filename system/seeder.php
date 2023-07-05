<?php

require_once __DIR__.'/../vendor/autoload.php';

$seeder = new \app\system\database\seeders\UserSeeder();
$seeder->run();