<?php

require_once __DIR__ . '/../config/env.php';

class DataBase {

    protected PDO $connect;

    public function __construct() {
        try {
            $dsn = sprintf('%s:host=%s;dbname=%s;port=%s;charset=utf8mb4', $_ENV['DB_DRIVER'], $_ENV['DB_LOCAL_HOST'], $_ENV['DB_LOCAL_NAME'], $_ENV['DB_PORT']);

            $this->connect = new PDO($dsn, $_ENV['DB_LOCAL_USER'], $_ENV['DB_LOCAL_PASSWD'],
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ]
            );

        } catch (PDOException $e) {
            throw new RuntimeException('Error al conectar a la base de datos.');
        }
    }

}