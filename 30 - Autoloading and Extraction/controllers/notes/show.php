<?php

/* In this lesson, we are gonna implement measures that a user can only access notes created by the concerned user and not the notes created by other users.
If a user try to access notes of other users, it may get a 404(Page not found) or 403(Forbidden) status code.
*/

//$config = require('config.php');
$config = require base_path('config.php');

// make an instance of Database class
$db = new Database($config['database']);

//$heading = "Note";

//dd($_GET['id']);

//$id = $_GET['id'];

//'select * from notes where /* user_id = :user and */ id = :id'

$note = $db->query('select * from notes where id = :id', [
//    'user' => 1,
    'id' => $_GET['id']
])->findOrFail();


/*
// if user tries to access note which is not in the database
if(! $note){
    abort();
}



$currentUserId = 1;
//$forbidden = 403;

// is user is not authorized to access the note(s) i.e. user is not creator of the note
if($note ['user_id'] !== $currentUserId){
    abort(Response::FORBIDDEN);
}

*/

$currentUserId = 1;
authorize($note ['user_id'] === $currentUserId);


//require "views/notes/show.view.php";

view("notes/show.view.php", [
    'heading' => 'Note',
    'note' => $note
]);