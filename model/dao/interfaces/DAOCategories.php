<?php

require_once __DIR__ . '/../../dto/DTOCategory.php';

/**
 * @extends IListable<DTOCategory>
 */
interface DAOCategories extends IListable {

    /**
     * @param DTOCategory $dto
     * @return void
     * @throws Exception
     */
    public function add(DTOCategory $dto) : void;

}