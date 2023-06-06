<?php

namespace app\app\controllers;

use app\app\models\Customer;
use app\system\classes\APIHandler;
use app\system\classes\Controller;
use app\system\classes\Request;
use app\system\classes\Response;

class ApiController extends Controller
{
    public function index()
    {
        $users = APIHandler::connect('https://gorest.co.in/public/v2/users', 'get');
        return $this->render('restapiusers', $users);
    }

    public function create(Request $request, Response $response)
    {
        $data = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'gender' => $_POST['gender'],
            'status' => $_POST['status'],
        ];
        APIHandler::$user_data = $data;
        APIHandler::connect('https://gorest.co.in/public/v2/users', 'post');
        $response->redirect('/restapiusers');
    }

    public function renderCreate()
    {
        return $this->render('create');
    }

    public function delete(Request $request, Response $response)
    {
        $id = $_POST['id'];
        APIHandler::$user_data = ['id' => $id];
        APIHandler::connect("https://gorest.co.in/public/v2/users/$id", 'delete');
        $response->redirect('/restapiusers');
    }

    public function edit()
    {
        $id = $_GET['id'];
        $params = APIHandler::connect("https://gorest.co.in/public/v2/users/$id", 'get');
        return $this->render('editapi', $params);
    }

    public function editHandle(Request $request, Response $response)
    {
        $id = $_GET['id'];
        $data = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'gender' => $_POST['gender'],
            'status' => $_POST['status'],
        ];
        APIHandler::$user_data = $data;
        APIHandler::connect("https://gorest.co.in/public/v2/users/$id", 'put');
        $response->redirect('/restapiusers');
    }
}