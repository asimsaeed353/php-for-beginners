<?php

use Core\App;
use Core\Container;
use Core\Database;

$container = new Container();

$container->bind('Core\Database', function (){

    // builder function responsible for building a database object

    $config = require base_path('config.php');
    return new Database($config['database']);
});

App::setContainer($container);

//$db = $container->resolve('Core\Database');
//
//$container->resolve('abcdfgg');
////$db = $container->resolve('Core\Database');