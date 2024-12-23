<?php

// we have replaced three controller files with this single entry point file. This will work as router and redirect users to different pages depending upon the user requests.

require "functions.php";
require 'Database.php';
require 'router.php';


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