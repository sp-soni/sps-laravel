# SPS Laravel Helper

## Features

- Generate HTML Form Tags in Laravel Project

## Usage

```php
{!! SPS\Form::label(\_\_('message.address'), 'address', true) !!}
{!! SPS\Form::input('address', old('address'), ['class' => 'form-control']) !!}
{!! SPS\Form::error($errors, 'address') !!}
```
