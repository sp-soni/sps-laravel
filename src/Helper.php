<?php

namespace SPS;

class Helper extends SPS
{
    public static function selectedSelect($left, $right)
    {
        if ($left == $right)
        {
            return 'selected';
        }
    }

    public static function input(string $name, string $value, array $extra = [])
    {
        $aAttribute = [
            'id' => $name,
            'name' => $name,
            'value' => $value,
            'class' => 'form-control',
            'type' => 'text'
        ];
        $aAttribute = array_merge($aAttribute, $extra);
        $attribute = '';
        foreach ($aAttribute as $property => $value)
        {
            $attribute .= $property . '="' . $value . '" ';
        }
        return '<input  ' . $attribute . '/>';
    }
}
