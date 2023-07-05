<?php

namespace app\system;

use app\app\models\User;
use app\app\seeders\CustomerSeeder;
use app\system\classes\Controller;
use app\system\classes\Request;
use app\system\classes\Response;
use app\system\classes\Router;
use app\system\classes\Session;
use app\system\classes\View;
use app\system\database\Database;
use app\system\database\DbModel;
use Exception;

class Application
{
    public string $layout = 'main';
    public static string $ROOT_DIR;
    public string $userClass;
    public Router $router;
    public Request $request;
    public Response $response;
    public Session $session;
    public Database $db;
    public CustomerSeeder $customerSeeder;
    public static Application $app;
    //TODO: remove recursive dependency
    public ?DbModel $user = null;
    public View $view;
    public ?Controller $controller = null;

    public function __construct($rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request, $this->response);
        $this->view = new View();
        $this->db = new Database();


        $primaryValue = $this->session->get('user');
        if ($primaryValue) {
            $this->user = (new User())->findOne(['id' => $primaryValue]);
        } else {
            $this->user = null;
        }
    }

    public static function isGuest(): bool
    {
        return !self::$app->user;
    }

    public function run(): void
    {
        try {
            echo $this->router->resolve();
        } catch (Exception $e) {
            $this->response->setStatusCode($e->getCode());
            echo $this->view->renderView('_error', [
                'exception' => $e
            ]);
        }
    }

    public function getController(): Controller
    {
        return $this->controller;
    }

    public function setController(Controller $controller): void
    {
        $this->controller = $controller;
    }
}