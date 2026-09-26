<?php

require_once __DIR__ . '/../../../database/DataBase.php';
require_once __DIR__ . '/../interfaces/DAOCategories.php';
require_once __DIR__ . '/../../dto/DTOCategory.php';

class DAOCategoriesImpl extends DataBase implements DAOCategories {

    /**
     * @param DTOCategory $dto
     * @return void
     */
    #[\Override]
    public function add(DTOCategory $dto) : void {

    }

    /**
     * @param int $id
     * @return object | null
     */
    #[\Override]
    public function findById(int $id) : ?DTOCategory {
        return null;
    }

    /**
     * @return list<DTOCategory>
     */
    #[\Override]
    public function findByAll() : array {
        return [];
    }

}