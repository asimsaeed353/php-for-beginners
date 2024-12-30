<?php

// we have replaced three controller files with this single entry point file. This will work as router and redirect users to different pages depending upon the user requests.

// let's declare a base path and add that before each required file

const BASE_PATH = __DIR__ . '/../';

//var_dump(BASE_PATH);

require BASE_PATH . "Core/functions.php";

// using base_path() function created in 'functions.php' for seamless experience
//require base_path('Database.php');
//require base_path('Response.php');

spl_autoload_register(function ($class){
    // now the class looks like Core\Database and it should be with forward slash as like Core/Database
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);


    require base_path("{$class}.php");
});

require base_path('Core/router.php');


// if you have a file that contains a class, the first letter of the filename is conventionally capital.



// ** To fetch a single result / single array **
//$posts =$db->query("select * from posts")->fetch(PDO::FETCH_ASSOC);
//dd($post['title']);

/*
// ** To fetch array of arrays **
$posts =$db->query("select * from posts")->fetchAll();
dd($posts);

*/

//foreach ($posts as $post){
//    echo "<li>" . $post['title'] . "</li>";
//}


// to fetch a single level of array ->fetch(PDO::FETCH_ASSOC);
// to fetch an array of arrays ->fetchAll(PDO::FETCH_ASSOC);