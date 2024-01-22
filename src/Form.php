<?php

namespace SPS;

class Form
{

    public static function dropdown($name, array $aOptions, $selected_value, $htmlOptions = [])
    {
        $htmlOptions['id'] = $name;
        $htmlOptions['name'] = $name;
        $htmlOptions['class'] = empty($htmlOptions['class']) ? 'form-select' : $htmlOptions['class'];
        $attribute = '';
        foreach ($htmlOptions as $property => $value)
        {
            $attribute .= $property . '="' . $value . '" ';
        }

        $html = '<select ' . $attribute . '>';
        foreach ($aOptions as $key => $value)
        {
            $selected = ($key == $selected_value) ? 'selected' : '';
            $html .= '<option value="' . $key . '"  ' . $selected . '>' . $value . '</option>';
        }
        $html .= '</select>';
        return $html;
    }

    public static function input($name, $value, $htmlOptions = [])
    {
        $aAttribute = [
            'id' => $name,
            'name' => $name,
            'value' => $value,
            'class' => 'form-control',
            'type' => 'text'
        ];
        $aAttribute = array_merge($aAttribute, $htmlOptions);
        $attribute = '';
        foreach ($aAttribute as $property => $value)
        {
            $attribute .= $property . '="' . $value . '" ';
        }
        return '<input  ' . $attribute . '/>';
    }

    public static function open($action = '', array $aAttribute = [])
    {
        $attribute = '';
        if (!empty($action))
        {
            $aAttribute['action'] = $action;
        }
        foreach ($aAttribute as $key => $value)
        {
            $attribute .= $key . '="' . $value . '"';
        }
        return '<form ' . $attribute . '>';
    }

    public static function close()
    {
        return '</form>';
    }
}
