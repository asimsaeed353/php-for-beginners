<?php

namespace Core;

// Building a better router
use Core\Middleware\Auth;
use Core\Middleware\Guest;
use Core\Middleware\Middleware;


class Router{
    protected $routes = [];

    // add method to append new routes to the routes[]
    public function add($method, $uri, $controller){
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null
        ];

        return $this;
    }
    public function get($uri, $controller){
        return $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller){
        return $this->add('POST', $uri, $controller);
    }

    public function delete($uri, $controller){
        return $this->add('DELETE', $uri, $controller);
    }
    public function patch($uri, $controller){
        return $this->add('PATCH', $uri, $controller);
    }


    public function put($uri, $controller){
        return $this->add('PUT', $uri, $controller);
    }

    public function only($key){
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
    }
    public function route($uri, $method){
       // Find a route/page to load
        foreach ($this->routes as $route){
            if($route['uri'] === $uri && $route['method'] === strtoupper($method)){

                Middleware::resolve($route['middleware']);

//                if($route['middleware']) {
//                    $middleware = Middleware::MAP[$route['middleware']];
//
//                    (new $middleware)->handle();
//                }
                /*


                // apply the middleware that only guest user can access register page
                if($route['middleware'] === 'guest'){
                    (new Guest)->handle();
                }

                // apply the middleware that only authorized user can access notes page
                if($route['middleware'] === 'auth'){
                    (new Auth)->handle();
                }

                */
                return require base_path('Http/controllers/' . $route['controller']);
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