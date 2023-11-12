<?php

namespace App\Helpers;

class DateHelper
{
    public static  function getFormats(): array {
        return [
            "m.d.y",
            "Ymd",
            "y.d.m",
            "D M j G:i:s T Y",
            "Y-m-d H:i:s"
        ];
    }
}