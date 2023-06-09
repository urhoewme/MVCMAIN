<?php

namespace app\app\controllers;

use app\app\models\ContactForm;
use app\app\seeders\CustomerSeeder;
use app\system\Application;
use app\system\classes\Controller;
use app\system\classes\Request;
use app\system\classes\Response;

class SiteController extends Controller
{
    public function home()
    {
        $params = [
            'name' => 'Yauheni'
        ];
        if ( (new CustomerSeeder())->seed() ) {
            return $this->render('home', $params);
        }
        return $this->render('home', $params);
    }

    public function contact(Request $request, Response $response)
    {
        $contact = new ContactForm();
        $contact->loadData($request->getBody());
        if ($contact->validate() && $contact->send()) {
            Application::$app->session->setFlash('success', 'Thanks for your feedback');
            return $response->redirect('/contact');
        }
    }

    public function renderContact()
    {
        $contact = new ContactForm();
        return $this->render('contact', [
            'model' => $contact
        ]);
    }


}