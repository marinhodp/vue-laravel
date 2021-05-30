<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Services\Uteis;

class Base64MaxSize implements Rule
{
    protected $maxSizeMB;
    protected $maxSizeBytes;
    protected $attributeName;

    public function __construct()
    {
        $this->maxSizeMB = 2;
        $this->maxSizeBytes = $this->maxSizeMB * 1000000;
    }

    public function passes($attribute, $value)
    {
        $this->attributeName = $attribute;
        $file = Uteis::convertBase64ToFile($value);
        $size = filesize($file);

        if ($size <= $this->maxSizeBytes) {
            return true;
        } else {
            return false;
        }
    }

    public function message()
    {
        return 'The '.$this->attributeName.' cannot be larger than '.$this->maxSizeMB.'MB.';
    }
}
