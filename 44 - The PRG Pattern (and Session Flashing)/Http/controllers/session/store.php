<?php

// log in the user if the credentials match

use Core\Authenticator;
use Core\Session;
use Http\Forms\LoginForm;

//$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

// Validate the input

$form = new LoginForm();

// if the login form validates
if ($form->validate($email, $password)) {
    // match the credentials

    // User authentication

    if((new Authenticator())->attempt($email, $password)){

        // if user authentication is successful, redirect to home page
        redirect('/');
    }

    $form->error('email', 'No matching account found for this email address and password.');
}

Session::flash('errors', $form->errors());

return redirect('/login');


