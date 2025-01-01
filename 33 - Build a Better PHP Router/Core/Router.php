<?php

namespace Core;

// Building a better router
class Router{
    protected $routes = [];

    // add method to append new routes to the routes[]
    public function add($method, $uri, $controller){
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'GET'
        ];
    }
    public function get($uri, $controller){
        $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller){
        $this->add('POST', $uri, $controller);
    }

    public function delete($uri, $controller){
        $this->add('DELETE', $uri, $controller);
    }
    public function patch($uri, $controller){
        $this->add('PATCH', $uri, $controller);
    }

    public function put($uri, $controller){
        $this->add('PUT', $uri, $controller);
    }

    public function route($uri, $method){
       // Find a route/page to load
        foreach ($this->routes as $route){
            if($route['uri'] === $uri && $route['method'] === strtoupper($method)){
                return require base_path($route['controller']);
            }
        }

        // if page is not found, abort:
        $this->abort();
    }

    protected function abort($code = 404)
    {
        http_response_code($code);

        require base_path("views/partials/{$code}.php");

        die();
    }
}

/*

//if($uri === '/'){
//    require 'controllers/index.php';
//} else if($uri === '/about'){
//    require 'controllers/about.php';
//} else if ($uri === '/contact'){
//    require 'controllers/contact.php';
//}

// the above code can be written as
$routes = require base_path('routes.php');

//$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

// if user visits a page which you don't have a corresponding controller for .
// PHP gives us a function to separate path from the query string.

//dd(parse_url($uri));

function routeToController($uri, $routes)
{
    if(array_key_exists($uri, $routes)){
        require base_path($routes[$uri]);
    } // if user requested page is not available, redirect to another page
    else {
        abort();
    }
}

function abort($statusCode = 404){
    http_response_code(404);
    require base_path("views/partials/${statusCode}.php");  // show user some responses
    die();
}

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = require base_path('routes.php');
//$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
routeToController($uri, $routes);

*/

