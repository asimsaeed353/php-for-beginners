<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = 1;

$note = $db->query('select * from notes where id = :id', [
    //    'user' => 1,
    'id' => $_GET['id']
])->findOrFail();

authorize($note ['user_id'] === $currentUserId); // if we don't have this authorization, anyone could edit this note

view("notes/edit.view.php", [
    'heading' => 'Edit Note',
    'errors' => [],
    'note' => $note
]);