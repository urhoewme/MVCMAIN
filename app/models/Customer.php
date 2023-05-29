<?php

namespace app\app\models;

use app\system\classes\DbModel;

class Customer extends DbModel
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const GENDER_MALE = 0;
    const GENDER_FEMALE = 1;
    public string $firstname = '';
    public string $email = '';
    public int $status = self::STATUS_INACTIVE;
    public int $gender = self::GENDER_MALE;

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
        $this->status = self::STATUS_INACTIVE;
        $this->gender = self::GENDER_MALE;
        return parent::save();
    }

    public function rules(): array
    {
        return [
            'firstname' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [
                self::RULE_UNIQUE, 'class' => self::class
            ]],
        ];
    }

    public function attributes(): array
    {
        return ['firstname', 'email', 'status', 'gender'];
    }

    public function labels(): array
    {
        return [
            'firstname' => 'First Name',
            'email' => 'Email',
        ];
    }
}