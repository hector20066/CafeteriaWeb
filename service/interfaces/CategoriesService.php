<?php

require_once __DIR__ . '/../../model/dto/DTOCategory.php';

interface CategoriesService {

    /**
     * @param string $name
     * @return void
     * @throws Exception
     */
    public function add(string $name) : void;

    /**
     * @param int $id
     * @return DTOCategory | null
     * @throws Exception
     */
    public function findById(int $id) : ?DTOCategory;

    /**
     * @return list<DTOCategory>
     * @throws Exception
     */
    public function findByAll() : array;

    /**
     * @return int
     * @throws Exception
     */
    public function countRecords() : int;

}
