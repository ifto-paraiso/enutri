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
}
