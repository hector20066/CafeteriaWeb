<?php

require_once __DIR__ . '/../config/env.php';

class DataBase {

    private static ?DataBase $instance = null;
    private PDO $connection;

    private function __construct() {
        try {
            $dsn = sprintf('%s:host=%s;dbname=%s;port=%s;charset=utf8mb4', $_ENV['DB_DRIVER'], $_ENV['DB_LOCAL_HOST'], $_ENV['DB_LOCAL_NAME'], $_ENV['DB_PORT']);

            $this->connection = new PDO($dsn, $_ENV['DB_LOCAL_USER'], $_ENV['DB_LOCAL_PASSWD'],
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ]
            );
        } catch (PDOException $e) {
            throw new RuntimeException('Error al conectar a la base de datos.', 0, $e);
        }
    }

    public static function getInstance() : DataBase {
        if (self::$instance === null) {
            self::$instance = new self();          
        }

        return self::$instance;
    }

    public function getConnection() : PDO {
        return $this->connection;
    }

    private function __clone() {
    }

    public function __wakeup() : void {
        throw new RuntimeException('Cannot unserialize singleton.');
    }

}
