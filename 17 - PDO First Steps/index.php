<?php

// we have replaced three controller files with this single entry point file. This will work as router and redirect users to different pages depending upon the user requests.

require "functions.php";

//require 'router.php';

/*

//OOP

class Person{
    public $name;
    public $age;
    public function breathing(){
        echo $this->name . ' is breathing.';
    }
}

$person = new Person();

$person->name = 'John Doe';
$person->age = 25;


//dd($person);
//
//dd($person->name);
//dd($person->age);
dd($person->breathing());

*/

/* *****  PDO - PHP Data Object  ****** */

// connect to MySql database

// dsn => data source name contains information required to connect to db.

$dsn = "mysql:host=localhost;port=3306;dbname=myapp;user=root;password=abc@12345;charset=utf8mb4";

// make an object of PDO
$pdo = new PDO($dsn);

// prepare a query statement to send to mysql and execute it
$statement = $pdo->prepare("select * from posts");
$statement->execute();

// fetch the result of the query
// $posts = $statement->fetchAll();   // this might give duplicated result

$posts = $statement->fetchAll(PDO::FETCH_ASSOC);

//dd($posts);

foreach ($posts as $post){
    echo "<li>" . $post['title'] . "</li>";
}