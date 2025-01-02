<?php

use Core\App;
use Core\Database;

//$db = App::container()->resolve('Core\Database');
//$db = App::container()->resolve(Database::class);
$db = App::resolve(Database::class);

$currentUserId = 1;

$note = $db->query('select * from notes where id = :id', [

    'id' => $_POST['id']
])->findOrFail();

authorize($note ['user_id'] === $currentUserId);

$db->query('delete from notes where id = :id', [
    'id' => $_POST['id']
]);

// when the note is deleted, redirect the user to the 'My Notes' page
header('location: /notes');
exit();

