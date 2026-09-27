<?php

use Decimal\Decimal;

require_once __DIR__ . '/../../model/dto/DTOProductDetails.php';
require_once __DIR__ . '/../../model/dto/DTOProductMenu.php';

interface ProductsService {

    /**
     * @param string $name
     * @param string $slug
     * @param int $categoryId
     * @param Decimal $price
     * @param string $image
     * @param string $description
     * @param string $briefDescription
     * @param list<string> $features
     * @return int
     */
    public function add(string $name, string $slug, int $categoryId, Decimal $price, string $image, string $description, string $briefDescription, array $features) : int;

    /**
     * @param string $name
     * @return DTOProductDetails | null
     */
    public function findByName(string $name) : ?DTOProductDetails;

    /**
     * @param string $slug
     * @return DTOProductDetails | null
     */
    public function findBySlug(string $slug) : ?DTOProductDetails;

    /**
     * @param int $id
     * @return DTOProductDetails | null
     */
    public function findById(int $id) : ?DTOProductDetails;

    /**
     * @return list<DTOProductDetails>
     */
    public function findByAll() : array;

    /**
     * @return list<DTOProductMenu>
     */
    public function findByAllMenu() : array;
    public function delete(int $id) : void;

}
