<?php



use app\system\Application;
use app\app\models\Admin;
require_once '../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$app = new Application(dirname(__DIR__));
require_once './routes.php';

$app->run();