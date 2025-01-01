<?php

use Core\Database;

/* In this lesson, we are gonna implement measures that a user can only access notes created by the concerned user and not the notes created by other users.
If a user try to access notes of other users, it may get a 404(Page not found) or 403(Forbidden) status code.
*/

//$config = require('config.php');
$config = require base_path('config.php');

// make an instance of Database class
$db = new Database($config['database']);
$currentUserId = 1;

// If 'Delete a Note' request is made
if($_SERVER['REQUEST_METHOD'] === 'POST'){


    /* Authorize the user */
    // check if the person who's making a 'delete note' request is authorized to do so
    $note = $db->query('select * from notes where id = :id', [
        //    'user' => 1,
        'id' => $_GET['id']
    ])->findOrFail();

    authorize($note ['user_id'] === $currentUserId);

    view("notes/show.view.php", [
        'heading' => 'Note',
        'note' => $note
    ]);

    /* Delete the current note */
    // Form was submitted : Delete the current note
    $db->query('delete from notes where id = :id', [
        'id' => $_GET['id']
    ]);

    // when the note is deleted, redirect the user to the 'My Notes' page
    header('location: /notes');
    exit();

} else{

    $note = $db->query('select * from notes where id = :id', [
    //    'user' => 1,
        'id' => $_GET['id']
    ])->findOrFail();

    authorize($note ['user_id'] === $currentUserId);

    view("notes/show.view.php", [
        'heading' => 'Note',
        'note' => $note
    ]);
}