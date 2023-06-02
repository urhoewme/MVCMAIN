<?php

namespace app\app\controllers;

use app\app\models\Customer;
use app\system\classes\Controller;
use app\system\classes\Request;
use app\system\classes\Response;

class UserController extends Controller
{
    public function create(Request $request, Response $response)
    {
        return $this->render('create');
    }

    public function handleCreate(Request $request, Response $response)
    {
        $customer = new Customer();
        $customer->loadData($request->getBody());
        echo '<pre>';
        var_dump($request->getBody());
        echo '<pre>';
        exit;
        if ($customer->save()) {
            $response->redirect('/users');
        }
    }

    public function edit()
    {
        $id = $_GET['id'];
        $customer = new Customer();
        $params = $customer->findById($id);
        return $this->render('edit', $params);
    }

    public function editUpdate()
    {
        $params = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'gender' => $_POST['gender'],
            'status' => $_POST['status']
        ];
        $customer = new Customer();
        $customer->update($params);
        return (new Response())->redirect('/users');
    }

    public function deleteUser()
    {
        $customer = new Customer();
        $customer->delete();
        return (new Response())->redirect('/users');
    }

    public function users()
    {
        $customer = new Customer();
        $params = $customer->findAll();
        return $this->render('users', $params);
    }
}