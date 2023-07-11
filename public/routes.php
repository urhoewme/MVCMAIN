<?php


use app\app\controllers\api\RestController;
use app\app\controllers\AuthController;
use app\app\controllers\SiteController;
use app\app\controllers\CustomerController;
use app\app\controllers\ContactController;
use app\system\Application;

$app = new Application(dirname(__DIR__));

$app->router->get('/', [SiteController::class, 'index']);
$app->router->get('/contact', [ContactController::class, 'index']);
$app->router->post('/contact', [ContactController::class, 'create']);

$app->router->get('/api/customers', [RestController::class, 'index']);
$app->router->get('/api/create', [RestController::class, 'create']);
$app->router->post('/api/create', [RestController::class, 'store']);
$app->router->post('/api/delete', [RestController::class, 'destroy']);
$app->router->get('/api/edit', [RestController::class, 'edit']);
$app->router->post('/api/edit', [RestController::class, 'update']);

$app->router->get('/users', [CustomerController::class, 'users']);
$app->router->get('/create', [CustomerController::class, 'index']);
$app->router->post('/create', [CustomerController::class, 'create']);
$app->router->get('/edit', [CustomerController::class, 'show']);
$app->router->post('/edit', [CustomerController::class, 'update']);

$app->router->post('/delete', [CustomerController::class, 'destroy']);
$app->router->post('/delete', [CustomerController::class, 'delete']);

$app->router->get('/login', [AuthController::class, 'index']);
$app->router->post('/login', [AuthController::class, 'customLogin']);
$app->router->get('/register', [AuthController::class, 'registration']);
$app->router->post('/register', [AuthController::class, 'customRegistration']);

$app->router->get('/logout', [AuthController::class, 'signOut']);
$app->router->get('/profile', [AuthController::class, 'profile']);