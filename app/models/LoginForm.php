<?php

namespace app\app\models;

use app\system\Application;
use app\system\classes\Login;
use app\system\classes\Model;

class LoginForm extends Model
{
    public string $email = '';
    public string $password = '';

    public function rules(): array
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED]
        ];
    }

    public function labels(): array
    {
        return [
            'email' => 'Your Email',
            'password' => 'Password',
        ];
    }

    public function login()
    {
        $logger = new Login();
        $admin = Admin::findOne(['email' => $this->email]);
        if (!$admin) {
            $this->addError('email', 'Admin with this email does not exist');
            return false;
        }
        if (!password_verify($this->password, $admin->password)) {
            $this->addError('password', 'Incorrect password');
            return false;
        }
        return $logger->login($admin);
    }
}