<?php

namespace Core;
use PDO;

class Database{
    public $connection;
    public $statement;

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

        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);

//        return $statement->fetchAll(PDO::FETCH_ASSOC);
//        return $statement;

        return $this;
    }

    // Fetch a single record
    public function find()
    {
        // $statement->fetch();

        return $this->statement->fetch();
    }

    // Fetch a single record
    public function findOrFail()
    {
        $result = $this->find();

        if(! $result ){
            abort();
        }

        return $result;
    }

    // Fetch an array / multiple records
    public function findAll()
    {
        // $statement->fetch();

        return $this->statement->fetchAll();
    }
}
