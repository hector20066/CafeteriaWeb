<?php

require_once __DIR__ . '/../../model/dto/DTOCategory.php';

class CategoriesServiceImpl implements CategoriesService {

    /**
     * @param string $name
     * @return void
     */
    #[\Override]
    public function add(string $name) : void {

    }

    /**
     * @param int $id
     * @return DTOCategory | null
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