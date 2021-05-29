<?php

namespace App\Services;

use Symfony\Component\HttpFoundation\File\File;

class Uteis
{
    public static function convertBase64ToFile($str)
    {
        if (strpos($str, ';base64') !== false) {
            [, $str] = explode(';', $str);
            [, $str] = explode(',', $str);
        }

        $binaryData = base64_decode($str);
        $tmpFile = tempnam(sys_get_temp_dir(), 'base64validator');
        file_put_contents($tmpFile, $binaryData);

        return new File($tmpFile);
    }
}
