<?php

namespace App\Helpers;

class GlobalHelper
{
    public static function convertDate($date)
    {
        return date('d/m/Y', strtotime($date));
    }
}
