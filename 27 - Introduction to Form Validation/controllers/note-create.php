<?php

$config = require ('config.php');
$db = new Database($config['database']);

$heading = "Create Note";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $errors = [];

    // server-side validation: if input message body is empty
    if(strlen($_POST['body']) === 0){
        $errors['body'] = 'A body is required';
    }

    if(strlen($_POST['body']) > 1000){
        $errors['body'] = 'Maximum Character Limit (1000 characters) Reached!';
    }

    if(empty($errors)){
        $db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
            'body' => $_POST['body'],
            'user_id' => 1
        ]);
    }


};

require ('views/note-create.view.php');

// super-global $POST hold the data of the post request

// if you do not sanitize the inputs, it can cause a lot of damage.

// 1) Sanitize the body of the note / input before it goes to the database
// 2) Allow the body of the note or / input to enter the database and then filter it when rendering onto the webpage.

/* PHP Builtin function 'htmlspecialchars('something');
    * Convert all applicable characters to HTML entities
 */