<?php

/* **** 18 - Extract a PHP Database Class **** */

class Database{
    public $connection;

    // constructor of the class
    public function __construct()
    {
        $dsn = "mysql:host=localhost;port=3306;dbname=myapp;user=root;password=abc@12345;charset=utf8mb4";

        $this->connection = new PDO($dsn);
    }

    public function query($query){

        $statement = $this->connection->prepare($query);
        $statement->execute();

//        return $statement->fetchAll(PDO::FETCH_ASSOC);
        return $statement;
    }
}
