<?php

namespace app\app\controllers;

use app\system\Application;
use app\system\classes\Controller;
use app\system\classes\Request;

class SiteController extends Controller
{
    public function home()
    {
        $params = [
            'name' => 'Yauheni'
        ];
        return $this->render('home', $params);
    }
    public function contact()
    {
        return $this->render('contact');
    }
    public static function handleContact(Request $request)
    {
        $body = $request->getBody();
        echo "<pre>";
        var_dump($body);
        echo "<pre>";
    }
}