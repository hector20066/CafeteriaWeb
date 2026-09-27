<?php

use Decimal\Decimal;

require_once __DIR__ . '/../../model/dto/DTOProductDetails.php';
require_once __DIR__ . '/../../model/dto/DTOProductMenu.php';

class ProductsServiceImpl implements ProductsService {

    /**
     * @param string $name
     * @param string $slug
     * @param int $categoryId
     * @param Decimal $price
     * @param string $image
     * @param string $description
     * @param string $briefDescription
     * @param array $features
     * @return int
     */
    #[\Override]
    public function add(string $name, string $slug, int $categoryId, Decimal $price, string $image, string $description, string $briefDescription, array $features) : int {
        return 0;
    }

    /**
     * @param string $name
     * @return DTOProductDetails | null
     */
    #[\Override]
    public function findByName(string $name) : ?DTOProductDetails {
        return null;
    }

    /**
     * @param string $slug
     * @return DTOProductDetails | null
     */
    #[\Override]
    public function findBySlug(string $slug) : ?DTOProductDetails {
        return null;
    }

    /**
     * @param int $id
     * @return DTOProductDetails | null
     */
    #[\Override]
    public function findById(int $id) : ?DTOProductDetails {
        return null;
    }

    /**
     * @return list<DTOProductDetails>
     */
    #[\Override]
    public function findByAll() : array {
        return [];
    }

    /**
     * @return list<DTOProductMenu>
     */
    #[\Override]
    public function findByAllMenu() : array {
        return [];
    }

    /**
     * @param int $id
     * @return void
     */
    #[\Override]
    public function delete(int $id) : void {

    }

}