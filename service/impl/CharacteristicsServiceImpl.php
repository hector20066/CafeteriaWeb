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
     * @param PDO $connection
     * @param int $productId
     * @param string $feature
     * @return void
     * @throws Exception
     */
    #[\Override]
    public function add(PDO $connection, int $productId, string $feature) : void {
        $dto = new DTOCharacteristics();
        $dto->setProductId($productId);
        $dto->setFeature($feature);

        $this->daoCharacteristics->add($connection, $dto);
    }

    /**
     * @param int $id
     * @return DTOCharacteristics | null
     * @throws Exception
     */
    #[\Override]
    public function findById(int $id) : ?DTOCharacteristics {
        $dto = $this->daoCharacteristics->findById($id);

        if ($dto === null) {
            throw new Exception("No se ha encontrado la característica con id: " . $id);
        }

        return $dto;
    }

    /**
     * @return list<DTOCharacteristics>
     * @throws Exception
     */
    #[\Override]
    public function findByAll() : array {
        return $this->daoCharacteristics->findByAll();
    }

    /**
     * @param string $name
     * @return list<DTOCharacteristics>
     * @throws Exception
     */
    #[\Override]
    public function findByProduct(string $name) : array {
        return $this->daoCharacteristics->findByProduct($name);
    }

}
