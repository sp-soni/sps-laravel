# SPS Laravel Helper

## Features

- Generate HTML Form Tags in Laravel Project

## Usage

```php
{!! SPS\Form::label(__('message.address'), 'address', true,['class' => 'form-label']) !!}
{!! SPS\Form::input('address', old('address'), ['class' => 'form-control']) !!}
{!! SPS\Form::error($errors, 'address') !!}
```
