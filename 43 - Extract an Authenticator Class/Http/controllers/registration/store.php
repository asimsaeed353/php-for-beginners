<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

// Validate the input

$errors = [];

// Check if the user's email is valid
if (! Validator::email($email)) {
    $errors['email'] = 'Please enter a valid email';
}

// password must be more than 7 characters and less than 255 characters long
if (! Validator::string($password, 7, 255)) {
    $errors['password'] = 'Password length must be more than 7 characters long';
}

if(! empty($errors)){

    // Load a view
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}

// Check if the user already has an account:
$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

    if($user) {
    // If user exists

        // redirect the user to some page (home page for now)
        header('location: /');
        exit(); // it's a good practice to kill the script after redirection.
    } else {
        // If no, store new user record in the database and log in user,

        $db->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT)
        ]);

        // mark the user logged in
//        $_SESSION['user'] = [
//            'email' => $email
//        ]; // this can be written as:
            login([
                'email' => $email
            ]);

        // redirect the user to some page (home page for now)
        header('location: /');
        exit(); // it's a good practice to kill the script after redirection.
    }