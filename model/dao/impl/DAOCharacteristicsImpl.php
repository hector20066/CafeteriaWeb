<?php

require_once __DIR__ . '/../interfaces/DAOCharacteristics.php';
require_once __DIR__ . '/../../dto/DTOCharacteristics.php';

class DAOCharacteristicsImpl implements DAOCharacteristics {

    private PDO $connection;

    public function __construct(PDO $connection) {
        $this->connection = $connection;
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
