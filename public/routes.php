<?php

use app\app\controllers\UserController;
use app\system\Application;
use app\app\controllers\SiteController;
use app\app\controllers\AuthController;

//$config = [
//    'db' => [
//        'dsn' => $_ENV['DB_DSN'],
//        'user' => $_ENV['DB_USER'],
//        'password' => $_ENV['DB_PASSWORD'],
//    ]
//];

$app = new Application(dirname(__DIR__), $GLOBALS['config']);

$app->router->get('/', [SiteController::class, 'home']);
$app->router->get('/contact', [SiteController::class, 'renderContact']);
$app->router->post('/contact', [SiteController::class, 'contact']);

$app->router->get('/users', [UserController::class, 'users']);
$app->router->get('/create', [UserController::class, 'create']);
$app->router->post('/create', [UserController::class, 'handleCreate']);
$app->router->get('/edit', [UserController::class, 'edit']);
$app->router->post('/edit', [UserController::class, 'editUpdate']);

$app->router->post('/delete', [UserController::class, 'deleteUser']);


$app->router->get('/login', [AuthController::class, 'renderLogin']);
$app->router->post('/login', [AuthController::class, 'login']);
$app->router->get('/register', [AuthController::class, 'renderRegister']);
$app->router->post('/register', [AuthController::class, 'register']);

$app->router->get('/logout', [AuthController::class, 'logout']);
$app->router->get('/profile', [AuthController::class, 'profile']);

