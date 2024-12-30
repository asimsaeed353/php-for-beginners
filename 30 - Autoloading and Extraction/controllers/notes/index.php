<?php

//$config = require('config.php');
$config = require base_path('config.php');

// make an instance of Database class
$db = new Database($config['database']);

//$heading = "My Notes";

$notes = $db->query("select * from notes where user_id = 1")->findAll();


//require "views/notes/index.view.php";

view("notes/index.view.php", [
    'heading' => 'My Notes',
    'notes' => $notes
]);