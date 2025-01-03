<?php

// log in the user if the credentials match

use Core\Validator;
use Core\App;
use Core\Database;
use Http\Forms\LoginForm;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

// Validate the input

$form = new LoginForm();

// if the login form didn't validate
if (! $form->validate($email, $password)) {
    return view('session/create.view.php', [
        'errors' => $form->errors()
    ]);
}

//$errors = [];
//
//// Check if the user's email is valid
//if (! Validator::email($email)) {
//    $errors['email'] = 'Please enter a valid email';
//}
//
//// password must be more than 7 characters and less than 255 characters long
//if (! Validator::string($password)) {
//    $errors['password'] = 'Please enter a valid password.';
//}
//
//if(! empty($errors)){
//
//    // Load a view
//    return view('session/create.view.php', [
//        'errors' => $errors
//    ]);
//}

// match the credentials

$user = $db->query('select * from users where email = :email', [
    'email' => $email,
])->find();

// if user found
if($user){
    // user does have an email in the database, let's authenticate the password

    if(password_verify($password, $user['password'])){
        login([
            'email' => $email
        ]);

        header('location: /');
        exit();
    }
}

// email or password validation fails
return view('session/create.view.php', [
    'errors' => [
        'password' => 'No matching account found for this email address and password.'
    ]
]);


