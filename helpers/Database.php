<?php

class Database extends PDO {
    private static $instance;

    public static function getInstance() {
        if (!self::$instance) {

            $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET . '';

            $opt = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false);

            self::$instance = new PDO($dsn, DB_USERNAME, DB_PASSWORD, $opt);
        }
        return self::$instance;
    }
}