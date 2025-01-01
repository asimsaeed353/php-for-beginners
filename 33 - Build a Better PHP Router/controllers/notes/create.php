<?php

use Core\Database;
use Core\Validator;

//use Core\Validator

require base_path('Core/Validator.php');

//$config = require('config.php');
$config = require base_path('config.php');

$db = new Database($config['database']);

//$heading = "Create Note";

//dd( Validator::email('adasfasfaskhfdalsf'));   // wrong email
//dd(Validator::email('john@example.com'));   // correct email

$errors = [];

if($_SERVER['REQUEST_METHOD'] === 'POST'){


//    $validator = new Validator();

    // server-side validation: if input message body is empty
    if(! Validator::string($_POST['body'], 1, 1000)){
        $errors['body'] = 'A body less than 1000 characters is required';
    }

//    if(strlen($_POST['body']) > 1000){
//        $errors['body'] = 'Maximum Character Limit (1000 characters) Reached!';
//    }

    if(empty($errors)){
        $db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
            'body' => $_POST['body'],
            'user_id' => 1
        ]);
    }


};

//require('views/notes/create.view.php');

view("notes/create.view.php", [
    'heading' => 'Create a Note',
    'errors' => $errors
]);