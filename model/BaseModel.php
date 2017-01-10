<?php

class BaseModel {
    protected $pdo;

    function __construct()
    {
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET . '';

        $opt = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false);

        $this->pdo = new PDO($dsn, DB_USERNAME, DB_PASSWORD, $opt);
    }

}