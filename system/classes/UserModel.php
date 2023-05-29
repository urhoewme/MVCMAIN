<?php

namespace app\system\classes;

abstract class UserModel extends DbModel
{
    abstract public function getDisplayName(): string;
}