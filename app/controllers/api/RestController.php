<?php

namespace app\app\controllers\api;

use app\system\classes\APIHandler;
use app\system\classes\Controller;
use app\system\classes\Request;
use app\system\classes\Response;

class RestController extends Controller
{
    public function index()
    {
        $users = APIHandler::connect('https://gorest.co.in/public/v2/users', 'get');
        return $this->render('/api/customers', $users);
    }

    public function create()
    {
        return $this->render('create');
    }

    public function store(Request $request, Response $response)
    {
        $data = $request->getBody();
        APIHandler::$user_data = $data;
        APIHandler::connect('https://gorest.co.in/public/v2/users', 'post');
        $response->redirect('/api/customers');
    }

    public function edit()
    {
        $id = $_GET['id'];
        $params = APIHandler::connect("https://gorest.co.in/public/v2/users/$id", 'get');
        return $this->render('/api/edit', $params);
    }

    public function update(Request $request, Response $response)
    {
        $id = $_GET['id'];
        $data = $request->getBody();
        APIHandler::$user_data = $data;
        APIHandler::connect("https://gorest.co.in/public/v2/users/$id", 'put');
        $response->redirect('/api/customers');
    }

    public function destroy(Request $request, Response $response)
    {
        $id = $_POST['id'];
        APIHandler::$user_data = ['id' => $id];
        APIHandler::connect("https://gorest.co.in/public/v2/users/$id", 'delete');
        $response->redirect('/api/customers');
    }
}