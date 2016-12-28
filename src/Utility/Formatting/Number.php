<?php

namespace Enutri\Utility\Formatting;

/**
 * Formatação de valores numéricos
 * 
 * @author Renato Uchoa <contato@renatouchoa.com.br>
 */
class Number
{
    /**
     * Transforma um valor em formato brasileiro em float
     * 
     * @param string $value
     * @return string
     */
    public static function brToFloat($value)
    {
        return str_replace(['.', ','], ['', '.'], $value);
    }
    
    /**
     * Transforma um valor float para o formato brasileiro
     * 
     * @param string $value
     * @return string
     */
    public static function floatToBr($value)
    {
        var_dump($value);die();
        return number_format($value, 2, ',', '.');
    }
}