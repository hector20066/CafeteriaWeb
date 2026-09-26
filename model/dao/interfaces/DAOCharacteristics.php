<?php

require_once __DIR__ . '/../../dto/DTOCharacteristics.php';

/**
 * @extends IListable<DTOCharacteristics>
 */
interface DAOCharacteristics extends IListable {

    public function add(DTOCharacteristics $dto) : void;

}