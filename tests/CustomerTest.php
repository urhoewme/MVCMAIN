<?php

namespace app\tests;
use app\app\models\Customer;
use PHPUnit\Framework\TestCase;

final class CustomerTest extends TestCase
{
    public function testClassConstructor()
    {
        $customer = new Customer();
        $customer->name = 'Biba';
        $customer->email = 'biba@bobin.com';
        $customer->status = 'active';
        $customer->gender = 'male';

        $this->assertSame('Biba', $customer->name);
        $this->assertSame('biba@bobin.com', $customer->email);
        $this->assertSame('active', $customer->status);
        $this->assertSame('male', $customer->gender);
    }
}