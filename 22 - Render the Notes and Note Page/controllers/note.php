<?php

$config = require ('config.php');

// make an instance of Database class
$db = new Database($config['database']);

$heading = "Note";

$note = $db->query('select * from notes where id = 1')->fetch();


require "views/note.view.php";