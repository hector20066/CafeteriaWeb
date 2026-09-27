<?php

require_once __DIR__ . '/../../model/dto/DTOCharacteristics.php';

interface CharacteristicsService {

    /**
     * @param PDO $connection
     * @param int $productId
     * @param string $feature
     * @return void
     * @throws Exception
     */
    public function add(PDO $connection, int $productId, string $feature) : void;

    /**
     * @param int $id
     * @return DTOCharacteristics | null
     * @throws Exception
     */
    public function findById(int $id) : ?DTOCharacteristics;

    /**
     * @return list<DTOCharacteristics>
     * @throws Exception
     */
    public function findByAll() : array;

    /**
     * @param string $name
     * @return list<DTOCharacteristics>
     * @throws Exception
     */
    public function findByProduct(string $name) : array;
    
}
