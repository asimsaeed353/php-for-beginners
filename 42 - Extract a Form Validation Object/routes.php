<?php


$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');

$router->get('/notes', 'notes/index.php')->only('auth');
$router->get('/note', 'notes/show.php');
$router->delete('/note', 'notes/destroy.php');

// Edit and Update Note
$router->get('/note/edit', 'notes/edit.php');
$router->patch('/note', 'notes/update.php');

// Show notes
$router->get('/notes/create', 'notes/create.php');
// create a note
$router->post('/notes', 'notes/store.php');

// registering a new user

$router->get('/register', 'registration/create.php')->only('guest');
$router->post('/register', 'registration/store.php')->only('guest');

$router->get('/login', 'session/create.php')->only('guest');
$router->post('/session', 'session/store.php')->only('guest');
$router->delete('/session', 'session/destroy.php')->only('auth');



