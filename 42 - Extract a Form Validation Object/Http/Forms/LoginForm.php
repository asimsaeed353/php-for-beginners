<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm
{
    protected $errors = [];
    public function validate($email, $password){

        // Check if the user's email is valid
        if (! Validator::email($email)) {
            $this->errors['email'] = 'Please enter a valid email';
        }

        // password must be more than 7 characters and less than 255 characters long
        if (! Validator::string($password)) {
            $this->errors['password'] = 'Please enter a valid password.';
        }

        return empty($this->errors);
    }

    public function errors(){
        return $this->errors;
    }
}