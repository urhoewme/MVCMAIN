<?php

namespace app\app\controllers;

use app\app\models\Customer;
use app\system\classes\APIHandler;
use app\system\classes\Controller;
use app\system\classes\Request;
use app\system\classes\Response;

class CustomerController extends Controller
{
    public function index()
    {
        $users = APIHandler::connect('https://gorest.co.in/public/v2/users', 'get');
        return $this->render('customersRest', $users);
    }

    public function create(Request $request, Response $response)
    {
        $data = $request->getBody();
        APIHandler::$user_data = $data;
        APIHandler::connect('https://gorest.co.in/public/v2/users', 'post');
        $response->redirect('/api/customers');
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
        $response->redirect('/api/customers');
    }

    public function edit()
    {
        $id = $_GET['id'];
        $params = APIHandler::connect("https://gorest.co.in/public/v2/users/$id", 'get');
        return $this->render('editRest', $params);
    }

    public function editHandle(Request $request, Response $response)
    {
        $id = $_GET['id'];
        $data = $request->getBody();
        APIHandler::$user_data = $data;
        APIHandler::connect("https://gorest.co.in/public/v2/users/$id", 'put');
        $response->redirect('/api/customers');
    }
}