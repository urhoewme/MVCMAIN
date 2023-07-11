<?php

namespace app\system\classes;

use AllowDynamicProperties;
use app\system\Application;
use app\system\database\DbModel;

#[AllowDynamicProperties] class Login
{
    public function login(DbModel $user): bool
    {
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $primaryValue = $user->{$primaryKey};
        $value = $user->{$primaryKey};
        Application::$app->session->set('user', $value);
        return true;
    }

    public function logout()
    {
        $this->user = null;
        Application::$app->session->remove('user');
    }
}