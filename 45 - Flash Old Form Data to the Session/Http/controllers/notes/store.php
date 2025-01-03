<?php

use Core\Validator;
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$errors = [];

// server-side validation: if input message body is empty
if(! Validator::string($_POST['body'], 1, 1000)){
    $errors['body'] = 'A body less than 1000 characters is required';
}

// Any error encountered
if(! empty($errors)) {
    // Validation issue
     return view("notes/create.view.php", [
        'heading' => 'Create a Note',
        'errors' => $errors
    ]);
}

$db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
    'body' => $_POST['body'],
    'user_id' => 1
]);

//$_SESSION['_flashed']['errors'] = $form->errors();

header('location: /notes');
die();

