<?php

require_once __DIR__ . '/../../dto/DTOCategory.php';

/**
 * @extends IListable<DTOCategory>
 */
interface DAOCategories extends IListable {

    public function add(DTOCategory $dto) : void;

}