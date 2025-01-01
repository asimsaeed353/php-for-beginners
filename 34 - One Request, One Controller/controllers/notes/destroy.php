<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

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

