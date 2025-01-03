<?php


$router->get('/', '/controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');

$router->get('/notes', 'controllers/notes/index.php')->only('auth');
$router->get('/note', 'controllers/notes/show.php');
$router->delete('/note', '/controllers/notes/destroy.php');

// Edit and Update Note
$router->get('/note/edit', 'controllers/notes/edit.php');
$router->patch('/note', 'controllers/notes/update.php');

// Show notes
$router->get('/notes/create', 'controllers/notes/create.php');
// create a note
$router->post('/notes', 'controllers/notes/store.php');

// registering a new user

$router->get('/register', '/controllers/registration/create.php')->only('guest');
$router->post('/register', '/controllers/registration/store.php')->only('guest');

$router->get('/login', '/controllers/session/create.php')->only('guest');
$router->post('/session', '/controllers/session/store.php')->only('guest');
$router->delete('/session', '/controllers/session/destroy.php')->only('auth');



