<?php

namespace app\app\controllers;

use app\app\models\LoginForm;
use app\app\models\User;
use app\system\Application;
use app\system\classes\Controller;
use app\system\classes\Login;
use app\system\classes\Request;
use app\system\classes\Response;
use app\system\middlewares\AuthMiddleware;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
    }

    public function login(Request $request, Response $response)
    {
        $loginForm = new LoginForm();
        $loginForm->loadData($request->getBody());
        if ($loginForm->validate() && $loginForm->login()) {
            $response->redirect('/');
            return;
        }
    }

    public function renderLogin()
    {
        $loginForm = new LoginForm();
        $this->setLayout('auth');
        return $this->render('login', [
            'model' => $loginForm,
        ]);
    }

    public function register(Request $request)
    {
        $user = new User();

        $user->loadData($request->getBody());

        if ($user->validate() && $user->save()) {
            Application::$app->session->setFlash('success', 'Thanks for registration !');
            self::login($request, Application::$app->response);
            exit;
        }
        return $this->render('register', [
            'model' => $user
        ]);

    }

    public function renderRegister()
    {
        $user = new User();
        $this->setLayout('auth');
        return $this->render('register', [
            'model' => $user
        ]);
    }

    public function logout(Request $request, Response $response)
    {
        $login = new Login();
        $login->logout();
        $response->redirect('/');
    }

    public function profile()
    {
        return $this->render('profile');
    }
}