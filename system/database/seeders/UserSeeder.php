<?php

namespace app\system\database\seeders;
use app\app\models\Customer;
use app\system\Application;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable('../');
$dotenv->load();

class UserSeeder
{
    public array $names = [
        'Andrew',
        'Alex',
        'Antony',
        'Boris',
        'Cody',
        'Darell',
        'Derek'
    ];

    public array $emails = [
        'some@body.com',
        'this@man.su',
        'befree@local.com',
        'sudekis@jason.pl',
        'dava@mail.ru',
        'kika@gmail.com',
        'cody@boris.com'
    ];

    public array $genders = [
        'male',
        'female'
    ];


    public array $status = [
        'active',
        'inactive'
    ];

    public function run()
    {
        $config = [
            'db' => [
                'dsn' => $_ENV['DB_DSN'],
                'user' => $_ENV['DB_USER'],
                'password' => $_ENV['DB_PASSWORD'],
            ]
        ];
        $app = new Application(dirname(__DIR__), $config);
        for($i = 0; $i<10; $i++)
        {
            $customer = new Customer();
            $customer->name = $this->names[rand(0, count($this->names)-1)];
            $customer->email = $this->emails[rand(0, count($this->emails)-1)];
            $customer->gender = $this->genders[rand(0, count($this->genders)-1)];
            $customer->status = $this->status[rand(0, count($this->status)-1)];
            $customer->save();
        }
    }
}