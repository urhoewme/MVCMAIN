<?php

namespace app\app\seeders;



use app\app\models\Customer;

class CustomerSeeder
{
    public function seed()
    {
        $data = [
            'name' => 'Yauheni',
            'email' => 'yauheni@mail.com',
            'gender' => 'male',
            'status' => 'active'
        ];
        $customer = new Customer();
        $customer->loadData($data);
        $customer->save();
    }
}