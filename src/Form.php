<?php

namespace SPS;

class Form
{

    public static function select(string $name, array $options, string $value, array $extra = [])
    {
        $aAttribute = [
            'id' => $name,
            'name' => $name,
            'class' => 'form-control form-select',
            'type' => 'text'
        ];
        $aAttribute = array_merge($aAttribute, $extra);

        $attribute = '';
        foreach ($aAttribute as $property => $value)
        {
            $attribute .= $property . '="' . $value . '" ';
        }

        $html = '<select ' . $attribute . '>';
        foreach ($options as $key => $value)
        {
            $selected = ($key == $value) ? 'selected' : '';
            $html .= '<option value="' . $key . '"  ' . $selected . '>' . $value . '</option>';
        }
        $html .= '</select>';
        return $html;
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

    public static function open(string $action = '', array $extra = [])
    {
        $attribute = '';
        if (!empty($action))
        {
            $extra['action'] = $action;
        }
        foreach ($extra as $key => $value)
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
