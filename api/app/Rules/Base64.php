<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Base64 implements Rule
{
    protected $attributeName;
    public function __construct() {}

    public function passes($attribute, $value)
    {
        $this->attributeName = $attribute;

        if (strpos($value, ';base64') !== false) {
            [, $value] = explode(';', $value);
            [, $value] = explode(',', $value);
        }

        if (base64_encode(base64_decode($value, true)) === $value) {
            return true;
        } else {
            return false;
        }
    }

    public function message()
    {
        return 'O '.$this->attributeName.' não está no formato base64.';
    }
}
