<?php


$router->get('/', '/controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');

$router->get('/notes', 'controllers/notes/index.php');
$router->get('/note', 'controllers/notes/show.php');
$router->delete('/note', '/controllers/notes/destroy.php');

// Show notes
$router->get('/notes/create', 'controllers/notes/create.php');
// create a note
$router->post('/notes', 'controllers/notes/store.php');


