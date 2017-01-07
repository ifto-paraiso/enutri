<?php

namespace Enutri\Utility\Formatting;

class Date
{
    public static function brToPhp($date)
    {
        return implode('-', array_reverse(explode('/', $date)));
    }
}

