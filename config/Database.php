<?php 

class Database {
    private static $connection = null;

    public static function get_connection() {
        if (self::$connection === null) {
            $config = require_once __DIR__ . '/dbConfig.php';
        }

        self::$connection = new \mysqli(
            $config['host'],
            $config['username'],
            $config['password'],
            $config['database']
        );

        if (self::$connection->connect_errno) {
            die('Kết nối thất bại: ' . self::$connection->connect_errno);
        }

        return self::$connection;
    }
}

?>