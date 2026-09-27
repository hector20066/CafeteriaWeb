<?php

require_once __DIR__ . '/../../model/dto/DTOCategory.php';

interface CategoriesService {

    public function add(string $name) : void;

    /**
     * @param int $id
     * @return DTOCategory | null
     */
    public function findById(int $id) : ?DTOCategory;

    /**
     * @return list<DTOCategory>
     */
    public function findByAll() : array;

}
