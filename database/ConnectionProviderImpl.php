<?php

require_once __DIR__ . '/DataBase.php';
require_once __DIR__ . '/ConnectionProvider.php';

class ConnectionProviderImpl implements ConnectionProvider {

    private DataBase $db;

    public function __construct(DataBase $db) {
        $this->db = $db;
    }

    public function getConnection() : PDO {
        return $this->db->getConnection();
    }

}
