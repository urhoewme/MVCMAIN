<?php


use app\app\controllers\api\CustomerController as CustomerApiController;
use app\app\controllers\AuthController;
use app\app\controllers\SiteController;
use app\app\controllers\CustomerController;
use app\app\controllers\ContactController;
use app\system\Application;

$app = new Application(dirname(__DIR__));

$app->router->get('/', [SiteController::class, 'index']);
$app->router->get('/contact', [ContactController::class, 'index']);
$app->router->post('/contact', [ContactController::class, 'create']);

$app->router->get('/api/customers', [CustomerApiController::class, 'index']);
$app->router->get('/api/customers/create', [CustomerApiController::class, 'create']);
$app->router->post('/api/customers/create', [CustomerApiController::class, 'store']);
$app->router->post('/api/customers/delete', [CustomerApiController::class, 'destroy']);
$app->router->get('/api/customers/edit', [CustomerApiController::class, 'edit']);
$app->router->post('/api/customers/edit', [CustomerApiController::class, 'update']);
$app->router->get('/api/customer', [CustomerApiController::class, 'show']);

$app->router->get('/customers', [CustomerController::class, 'index']);
$app->router->get('/customers/create', [CustomerController::class, 'new']);
$app->router->post('/customers/create', [CustomerController::class, 'create']);
$app->router->get('/customer/edit', [CustomerController::class, 'edit']);
$app->router->post('/customer/edit', [CustomerController::class, 'update']);
$app->router->get('/customer', [CustomerController::class, 'show']);
$app->router->post('/customers/delete', [CustomerController::class, 'destroy']);
$app->router->post('/customers/delete', [CustomerController::class, 'delete']);

$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'signIn']);
$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'signUp']);

$app->router->get('/logout', [AuthController::class, 'logOut']);
$app->router->get('/profile', [AuthController::class, 'profile']);