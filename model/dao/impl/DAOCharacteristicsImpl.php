<?php

require_once __DIR__ . '/../../../database/DataBase.php';
require_once __DIR__ . '/../interfaces/DAOCharacteristics.php';
require_once __DIR__ . '/../../dto/DTOCharacteristics.php';

class DAOCharacteristicsImpl extends DataBase implements DAOCharacteristics {

    private static ?DAOCharacteristicsImpl $instance = null;

    private function __construct() {
        parent::__construct();
    }

    public static function getInstance() : DAOCharacteristicsImpl {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * @param DTOCharacteristics $dto
     * @return void
     */
    #[\Override]
    public function add(DTOCharacteristics $dto) : void {

    }

    /**
     * @param int $id
     * @return object | null
     */
    #[\Override]
    public function findById(int $id) : ?DTOCharacteristics {
        return null;
    }

    /**
     * @return array
     */
    #[\Override]
    public function findByAll() : array {
        return [];
    }

}