<?php

namespace app\system\form;

class SelectField extends BaseField
{
    public function renderInput(): string
    {
        return sprintf('<select name="%s" class="form-select%s"></select>',);
    }
}