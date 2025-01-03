<?php

namespace Core;

class App {
    protected static $container;

    public static function setContainer($container) {
        static::$container = $container;
    }

    public static function container() {
        return static::$container;
    }

    // Delegation function which shortens App::container->bind($key, $resolver) to App::bind($key, $resolver)
    public static function bind($key, $resolver) {
        static::container()->bind($key, $resolver);
    }

    // Delegation function which shortens App::container->resolve($key) to App::resolve($key)
    public static function resolve($key) {
        return static::container()->resolve($key);
    }
}