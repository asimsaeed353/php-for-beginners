<?php

// the functions in this file will be used in all php controller files.

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

// Check a condition and abort if it is false
function authorize($condition, $status = Response::FORBIDDEN){
    if(! $condition){
        abort($status);
    }
}