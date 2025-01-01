<?php

use Core\Database;


/*
// Methods to declare that class belongs to a specific namespace
// i) Core\Database
// ii) use namespace_name
*/

$config = require base_path('config.php');
$db = new Database($config['database']);

//$heading = "My Notes";

$notes = $db->query("select * from notes where user_id = 1")->findAll();


//require "views/notes/index.view.php";

view("notes/index.view.php", [
    'heading' => 'My Notes',
    'notes' => $notes
]);