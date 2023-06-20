<?php

class Database {
    private static $instance;
    private $pdo;

    private function __construct() {
        $host = constant('DB_HOST');
        $db = constant('DB_NAME');
        $user = constant('DB_USER');
        $password = constant('DB_PASS');
        $charset = constant('DB_CHARSET');

        $connection = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        $this->pdo = new PDO($connection, $user, $password, $options);
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->pdo;
    }
}
