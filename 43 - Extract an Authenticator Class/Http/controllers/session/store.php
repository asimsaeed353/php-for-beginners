<?php

// log in the user if the credentials match

use Core\Authenticator;
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


return view('session/create.view.php', [
    'errors' => $form->errors()
]);



// email or password validation fails
//return view('session/create.view.php', [
//    'errors' => [
//        'email' => 'No matching account found for this email address and password.'
//    ]
//]);


