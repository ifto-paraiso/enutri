<?php

namespace Enutri\Model\Util;

use ArrayObject;

class Sanitize
{
    public static function trimFields(ArrayObject $data, array $fields = [])
    {
        foreach ($fields as $field) {
            if(array_key_exists($field, $data)) {
                $data[$field] = trim($data[$field]);
            }
        }
        return $data;
    }
    
    public static function removerAcentos($text)
    {
        $replaces = [
            'á' => 'a',
            'à' => 'a',
            'ã' => 'a',
            'â' => 'a',
            'é' => 'e',
            'ê' => 'e',
            'í' => 'i',
            'ó' => 'o',
            'ô' => 'o',
            'õ' => 'o',
            'ú' => 'u',
            'ü' => 'u',
            'ç' => 'c',
            'Á' => 'A',
            'À' => 'A',
            'Ã' => 'A',
            'Â' => 'A',
            'É' => 'E',
            'Ê' => 'E',
            'Í' => 'I',
            'Ó' => 'O',
            'Ô' => 'O',
            'Õ' => 'O',
            'Ú' => 'U',
            'Ü' => 'U',
            'Ç' => 'C'
        ];
        return strtr($text, $replaces);
    }
}
