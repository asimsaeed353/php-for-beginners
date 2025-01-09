<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm
{
    protected $errors = [];

    public function __construct(public array $attributes)
    {
        // Check if the user's email is valid
        if (! Validator::email($attributes['email'])) {
            $this->errors['email'] = 'Please enter a valid email';
        }

        // password must be more than 7 characters and less than 255 characters long
        if (! Validator::string($attributes['password'])) {
            $this->errors['password'] = 'Please enter a valid password.';
        }
    }

    public static function validate($attributes){

        // instantiate a class
        $instance = new static($attributes);

        return $instance->failed() ? $instance->throw() : $instance;

    }

    public function throw(){
        ValidationException::throw($this->errors(), $this->attributes);
    }

    public function failed(){
//        / if validation fails i.e. error[] is not empty
        return count($this->errors);
    }


    public function errors(){
        return $this->errors;
    }

    public function error($field, $message){
        $this->errors[$field] = $message;

        return $this;
    }
}