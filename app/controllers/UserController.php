<?php

namespace app\app\controllers;

require_once '../vendor/autoload.php';

use app\app\models\Customer;
use app\system\classes\Controller;
use app\system\classes\Request;
use app\system\classes\Response;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;



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
    public function deleteChecked()
    {
        $customer = new Customer();
        $customer->deleteMultiple();
        return (new Response())->redirect('/users');
    }

//    public function users()
//    {
//        $customer = new Customer();
//        $params = $customer->findAll();
//        return $this->render('users', $params);
//    }
    public function users()
    {
        $loader = new FilesystemLoader( '../app/views');
        $twig = new Environment($loader, [
            'debug' => true,
        ]);
        $twig->addExtension(new \Twig\Extension\DebugExtension());
        $customer = new Customer();
        $params = $customer->findAll();
        $template = $twig->load('users.twig');
//        echo '<pre>';
//        var_dump($params);
//        echo '<pre>';
//        exit;
        return $template->render(['name' => $params[0], 'pages' => $params[1]]);
    }
}