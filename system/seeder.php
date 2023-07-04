<?php

require_once '../vendor/autoload.php';

//$seederDir = '/database/seeders';
//$seederFiles = glob($seederDir . '/*.php');
//
//foreach ($seederFiles as $seederFile) {
//    require_once $seederFile;
//    $seederClass = basename($seederFile, '.php');
//    $seeder = new $seederClass();
//    $seeder->run();
//}
$seeder = new \app\system\database\seeders\UserSeeder();
$seeder->run();