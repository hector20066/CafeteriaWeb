<?php

require_once __DIR__ . '/../../dto/DTOCharacteristics.php';

/**
 * @extends IListable<DTOCharacteristics>
 */
interface DAOCharacteristics extends IListable {

    public function add(PDO $connection, DTOCharacteristics $dto) : void;

    /**
     * @param int $productId
     * @return list<DTOCharacteristics>
     */
    public function findByProduct(int $productId) : array;

}