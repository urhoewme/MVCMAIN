<?php

namespace app\app\models;

use app\system\database\DbModel;

class Customer extends DbModel
{
    public string $name = '';
    public string $email = '';
    public string $gender = '';
    public string $status = '';
    public static function tableName(): string
    {
        return 'customers';
    }
    public static function primaryKey(): string
    {
        return 'id';
    }

    public function save()
    {
        return parent::save();
    }

    public function rules(): array
    {
        return [
            'name' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [
                self::RULE_UNIQUE, 'class' => self::class
            ]],
        ];
    }

    public function labels(): array
    {
        return [
            'name' => 'Your Name',
            'email' => 'Your Email',
            'gender' => 'Your Gender',
            'status' => 'Your Status',
        ];
    }
    public function attributes(): array
    {
        return ['name', 'email', 'gender', 'status'];
    }
}