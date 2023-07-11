<?php

namespace app\app\controllers;

require_once '../vendor/autoload.php';

use app\app\models\Customer;
use app\system\classes\Controller;
use app\system\classes\Request;
use app\system\classes\Response;
use app\system\middlewares\AuthMiddleware;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;



class CustomerController extends Controller
{

    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['users']));
    }
    public function index(Request $request, Response $response)
    {
        return $this->render('create');
    }

    public function create(Request $request, Response $response)
    {
        $customer = new Customer();
        $customer->loadData($request->getBody());
        if ($customer->save()) {
            $response->redirect('/users');
        }
    }

    public function show()
    {
        $id = $_GET['id'];
        $customer = new Customer();
        $params = $customer->findById($id);
        return $this->render('edit', $params);
    }

    public function update(Request $request)
    {
        $params = $request->getBody();
        $params['id'] = $_GET['id'];
        $customer = new Customer();
        $customer->update($params);
        return (new Response())->redirect('/users');
    }

    public function destroy()
    {
        $customer = new Customer();
        $customer->delete();
        return (new Response())->redirect('/users');
    }
    public function delete(Request $request, Response $response)
    {
        if (!isset($_POST['record']) || !is_array($_POST['record']))
        {
            return $response->redirect('/users');
        }
        $customer = new Customer();
        $customer->deleteMultiple();
        return $response->redirect('/users');
    }
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
        return $template->render(['name' => $params[0], 'pages' => $params[1]]);
    }
}