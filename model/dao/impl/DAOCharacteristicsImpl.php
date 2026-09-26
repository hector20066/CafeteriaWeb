<?php

class DAOCharacteristicsImpl implements DAOCharacteristics {

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