<?php

require_once __DIR__ . '/../interfaces/CharacteristicsService.php';
require_once __DIR__ . '/../../model/dao/interfaces/DAOCharacteristics.php';
require_once __DIR__ . '/../../model/dto/DTOCharacteristics.php';

class CharacteristicsServiceImpl implements CharacteristicsService {

    private DAOCharacteristics $daoCharacteristics;

    public function __construct(DAOCharacteristics $daoCharacteristics) {
        $this->daoCharacteristics = $daoCharacteristics;
    }

    /**
     * @param int $productId
     * @param string $feature
     * @return void
     */
    #[\Override]
    public function add(int $productId, string $feature) : void {

    }

    /**
     * @param int $id
     * @return DTOCharacteristics | null
     */
    #[\Override]
    public function findById(int $id) : ?DTOCharacteristics {
        return null;
    }

    /**
     * @return list<DTOCharacteristics>
     */
    #[\Override]
    public function findByAll() : array {
        return [];
    }

    /**
     * @param string $name
     * @return list<DTOCharacteristics>
     */
    #[\Override]
    public function findByProduct(string $name) : array {
        return [];
    }

}