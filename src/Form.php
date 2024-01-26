<?php

namespace SPS;

class Form
{

    private static function arrayToAttribute(array $aAttribute)
    {
        $attribute = '';
        foreach ($aAttribute as $property => $value)
        {
            $attribute .= $property . '="' . $value . '" ';
        }
        return $attribute;
    }

    public static function value($key, $model = null)
    {
        $value = '';
        if (!empty($_GET[$key]))
        {
            $value =  $_GET[$key];
        }
        elseif (!empty($_POST[$key]))
        {
            $value =  $_POST[$key];
        }
        elseif ($model && property_exists($model, $key))
        {
            $value =  $model->$key;
        }
        return $value;
    }

    public static function textarea(string $name, string $value, array $extra = [])
    {
        $aAttribute = [
            'id' => $name,
            'name' => $name,
            'class' => 'form-control',
            'row'  => 5,
            'cols' => 50
        ];
        $aAttribute = array_merge($aAttribute, $extra);

        $attribute = self::arrayToAttribute($aAttribute);
        return '<textarea ' . $attribute . '>' . $value . '</textarea>';
    }

    public static function select(string $name, array $options, string $value, array $extra = [])
    {
        $aAttribute = [
            'id' => $name,
            'name' => $name,
            'class' => 'form-control form-select',
            'type' => 'text'
        ];
        $aAttribute = array_merge($aAttribute, $extra);

        $attribute = self::arrayToAttribute($aAttribute);

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
        $attribute = self::arrayToAttribute($aAttribute);
        return '<input  ' . $attribute . '/>';
    }

    public static function label(string $text, string $for,  bool $required = false, array $extra = [])
    {
        $aAttribute = [
            'for' => $for,
        ];
        $aAttribute = array_merge($aAttribute, $extra);
        $attribute = self::arrayToAttribute($aAttribute);
        if ($required)
        {
            $text .= '&nbsp;<span class="required">*</span>';
        }
        return '<label  ' . $attribute . '>' . $text . '</label>';
    }

    public static function error($errors, $fieldName)
    {
        if ($errors->has($fieldName))
        {
            echo '<div class="text-danger">' . $errors->first($fieldName) . '</div>';
        }
    }

    public static function open(string $action = '', array $aAttribute = [])
    {
        if (!empty($action))
        {
            $aAttribute['action'] = $action;
        }
        $attribute = self::arrayToAttribute($aAttribute);
        return '<form ' . $attribute . '>';
    }

    public static function close()
    {
        return '</form>';
    }
}
