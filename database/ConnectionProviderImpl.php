<?php

require_once __DIR__ . '/DataBase.php';

class ConnectionProviderImpl {

    private DataBase $db;

    public function __construct(DataBase $db) {
        $this->db = $db;
    }

    public function getConnection() : PDO {
        return $this->db->getConnection();
    }

}
