<?php

namespace Core;

class Validator{

    // A static pure function can be accessed without creating the instance of the class and can be accessed using class name and scope resolution operator ClassName::static_pure_function_name()

    // validate the message input
    public static function string($value, $min = 1, $max = INF){
        $value = trim($value);

        return (strlen($value) >= $min && strlen($value) <= $max);
    }

    // Validate email
    public static function email($value){
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}