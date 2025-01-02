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
            'method' => $method
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