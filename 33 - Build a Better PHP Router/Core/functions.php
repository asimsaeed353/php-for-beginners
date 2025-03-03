<?php

use Core\Response;

function dd($superGlobal)
{
echo "<pre>";
    var_dump($superGlobal);
    echo "</pre>";

die(); // stop the execution
}

function urlIs($variable){
    return ($_SERVER['REQUEST_URI'] == $variable);
}

function abort($code = 404)
{
    http_response_code($code);

    require base_path("views/partials/{$code}.php");

    die();
}

// Check a condition and abort if it is false
function authorize($condition, $status = Response::FORBIDDEN){
    if(! $condition){
        abort($status);
    }

    return true;
}

// create a base_path generator
function base_path($path){
    return BASE_PATH . $path;
}

// create a method to load views
function view($path, $attributes = [])
{
    extract($attributes);
    require base_path('/views/' . $path);  // output base_path/views/file_name.view.php
}