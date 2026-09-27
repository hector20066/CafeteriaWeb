<?php

require_once __DIR__ . '/../../dto/DTOCharacteristics.php';

/**
 * @extends IListable<DTOCharacteristics>
 */
interface DAOCharacteristics extends IListable {

    /**
     * @param PDO $connection
     * @param DTOCharacteristics $dto
     * @return void
     * @throws Exception
     */
    public function add(PDO $connection, DTOCharacteristics $dto) : void;

    /**
     * @param int $productId
     * @return list<DTOCharacteristics>
     * @throws Exception
     */
    public function findByProduct(int $productId) : array;

}