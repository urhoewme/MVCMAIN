<?php

namespace app\app\controllers;

use app\app\models\ContactForm;
use app\system\Application;
use app\system\classes\Controller;
use app\system\classes\Request;
use app\system\classes\Response;

class ContactController extends Controller
{
    public function index()
    {
        $contact = new ContactForm();
        return $this->render('contact', [
            'model' => $contact
        ]);
    }

    public function create(Request $request, Response $response)
    {
        $contact = new ContactForm();
        $contact->loadData($request->getBody());
        if ($contact->validate() && $contact->send()) {
            Application::$app->session->setFlash('success', 'Thanks for your feedback');
            $response->redirect('/contact');
        }
    }
}