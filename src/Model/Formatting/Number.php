<?php

namespace Enutri\Model\Formatting;

use Enutri\Utility\Formatting\Number as N;
use ArrayObject;

/**
 * Formatação de valores numéricos
 * 
 * @author Renato Uchoa <contato@renatouchoa.com.br>
 */
class Number
{
    /**
     * Transforma um valor numérico em formato brasileiro para float
     * 
     * @param ArrayObject $data
     * @param array $fields
     * @return ArrayObject
     */
    public static function brToFloat(ArrayObject $data, array $fields)
    {
        foreach ($fields as $field) {
            if (isset($data[$field])) {
                $data[$field] = N::brToFloat($data[$field]);
            }
        }
        return $data;
    }
}