<?php

use Illuminate\Support\Facades\Route;

if (!function_exists('active_link')) {
    function active_link(string $name, string $active = 'active'): string
    {
        return Route::is($name) ? $active : '';
    }
}

if (!function_exists('alert')) {
    function alert(string $value)
    {
        session(['alert' => $value]);
    }
}

if (!function_exists('validate')) {
    function validate(array $attributes, array $rules)
    {
        return validator($attributes, $rules)->validate();
    }
}

if (!function_exists('__money')) {
    function __money(string $amount, string $currency_id): string
    {
        $value = number_format($amount, 2, '.', ' ');

        if ($currency_id == 'BTC') {
            $currency_id = "₿";
        }

        return "{$value} {$currency_id}";
    }
}
