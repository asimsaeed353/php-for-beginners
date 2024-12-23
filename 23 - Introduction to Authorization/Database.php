<?php

/* **** 18 - Extract a PHP Database Class **** */

class Database{
    public $connection;

    // constructor of the class
    public function __construct($config, $username = 'root', $password = 'abc@12345')
    {

        // convert the hardcoded value in automatic query
//        http_build_query($config, '', ';');  // host=localhost;port=3306;dbname=notes;charset=utf8mb4

        $dsn = "mysql:" . http_build_query($config, '', ';');   // host=localhost;port=3306;dbname=notes;charset=utf8mb4

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query, $params = []){

        $statement = $this->connection->prepare($query);
        $statement->execute($params);

//        return $statement->fetchAll(PDO::FETCH_ASSOC);
        return $statement;
    }
}
