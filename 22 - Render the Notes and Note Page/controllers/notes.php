<?php

$config = require ('config.php');

// make an instance of Database class
$db = new Database($config['database']);

$heading = "Notes";

$notes = [];

dd($db);

require "views/notes.view.php";