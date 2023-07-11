<?php

namespace app\system\classes;

use app\system\database\DbModel;

abstract class AdminModel extends DbModel
{
    abstract public function getDisplayName(): string;
}