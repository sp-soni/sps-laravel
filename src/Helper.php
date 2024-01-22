<?php

namespace SPS;

class Helper
{
    public function selectedSelect($left, $right)
    {
        if ($left == $right)
        {
            return 'selected';
        }
    }
}
