<?php



use app\app\controllers\UserController;
use app\system\Application;
use app\app\controllers\SiteController;
use app\app\controllers\AuthController;
use \app\app\controllers\CustomerController;

$app = new Application(dirname(__DIR__));

$app->router->get('/', [SiteController::class, 'home']);
$app->router->get('/contact', [SiteController::class, 'renderContact']);
$app->router->post('/contact', [SiteController::class, 'contact']);

$app->router->get('/api/customers', [CustomerController::class, 'index']);
$app->router->get('/api/create', [CustomerController::class, 'renderCreate']);
$app->router->post('/api/create', [CustomerController::class, 'create']);
$app->router->post('/api/delete', [CustomerController::class, 'delete']);
$app->router->get('/api/edit', [CustomerController::class, 'edit']);
$app->router->post('/api/edit', [CustomerController::class, 'editHandle']);

$app->router->get('/users', [UserController::class, 'users']);
$app->router->get('/create', [UserController::class, 'create']);
$app->router->post('/create', [UserController::class, 'handleCreate']);
$app->router->get('/edit', [UserController::class, 'edit']);
$app->router->post('/edit', [UserController::class, 'editUpdate']);

$app->router->post('/delete', [UserController::class, 'deleteUser']);
$app->router->post('/delete', [UserController::class, 'deleteChecked']);

$app->router->get('/login', [AuthController::class, 'renderLogin']);
$app->router->post('/login', [AuthController::class, 'login']);
$app->router->get('/register', [AuthController::class, 'renderRegister']);
$app->router->post('/register', [AuthController::class, 'register']);

$app->router->get('/logout', [AuthController::class, 'logout']);
$app->router->get('/profile', [AuthController::class, 'profile']);