<?php

// This file contains the routes to all the pages in this project

return [
    '/' => 'controllers/index.php',
    '/about' => 'controllers/about.php',
    '/notes' => 'controllers/note/index.php',
    '/note' => 'controllers/note/show.php',
    '/notes/create' => 'controllers/note/create.php',
    '/contact' => 'controllers/contact.php'
];