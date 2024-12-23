<?php

$config = require ('config.php');

// make an instance of Database class
$db = new Database($config['database']);

$heading = "Note";

//dd($_GET['id']);

//$id = $_GET['id'];

$note = $db->query('SELECT * from notes where id= :id', ['id' => $_GET['id']])->fetch();


require "views/note.view.php";