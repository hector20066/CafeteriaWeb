<?php

require_once __DIR__ . '/../../model/dto/DTOCharacteristics.php';

interface CharacteristicsService {

    public function add(int $productId, string $feature) : void;

    /**
     * @param int $id
     * @return DTOCharacteristics | null
     */
    public function findById(int $id) : ?DTOCharacteristics;

    /**
     * @return list<DTOCharacteristics>
     */
    public function findByAll() : array;

    /**
     * @param string $name
     * @return list<DTOCharacteristics>
     */
    public function findByProduct(string $name) : array;
    
}
