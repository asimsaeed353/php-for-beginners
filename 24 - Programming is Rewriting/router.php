<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

// if user visits a page which you don't have a corresponding controller for .
// PHP gives us a function to separate path from the query string.

//dd(parse_url($uri));


//if($uri === '/'){
//    require 'controllers/index.php';
//} else if($uri === '/about'){
//    require 'controllers/about.php';
//} else if ($uri === '/contact'){
//    require 'controllers/contact.php';
//}

// the above code can be written as



$routes = [
    '/' => 'controllers/index.php',
    '/about' => 'controllers/about.php',
    '/notes' => 'controllers/notes.php',
    '/note' => 'controllers/note.php',
    '/contact' => 'controllers/contact.php'
];

function routeToController($uri, $routes)
{
    if(array_key_exists($uri, $routes)){
        require $routes[$uri];
    } // if user requested page is not available, redirect to another page
    else {
        abort();
    }
}

function abort($statusCode = 404){
    http_response_code(404);
    require "views/partials/${statusCode}.php";  // show user some respones
    die();
}

routeToController($uri, $routes);

