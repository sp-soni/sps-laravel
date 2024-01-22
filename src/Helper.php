<?php

namespace SPS;

class Helper
{
    public static function selectedSelect($left, $right)
    {
        if ($left == $right)
        {
            return 'selected';
        }
    }
}
