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
    public function index()
    {
        $params = [
            'name' => 'Yauheni'
        ];
        return $this->render('home', $params);
    }
}