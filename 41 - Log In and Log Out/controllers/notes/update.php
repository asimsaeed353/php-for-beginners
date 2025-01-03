<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$currentUserId = 1;

// find the corresponding note
$note = $db->query('select * from notes where id = :id', [
    //    'user' => 1,
    'id' => $_POST['id']
])->findOrFail();


// authorize that the current user can edit the note
authorize($note ['user_id'] === $currentUserId);


// validate the form i.e. user has entered correct characters
$errors = [];

// server-side validation: if input message body is empty
if(! Validator::string($_POST['body'], 1, 1000)){
    $errors['body'] = 'A body less than 1000 characters is required';
}


// if there are validation errors, update the record to the notes table
if (count($errors)) {
    return view('/notes/edit.view.php', [
        'heading' => 'Edit Note',
        'errors' => $errors,
        'note' => $note
    ]);
}

// if no validation errors

$db->query('update notes set body = :body where id = :id', [
    'id' => $_POST['id'],
    'body' => $_POST['body']
]);


// redirect the user to the notes

header('location: /notes');
die();
