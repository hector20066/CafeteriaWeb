<?php

require_once __DIR__ . '/../../../database/DataBase.php';
require_once __DIR__ . '/../interfaces/DAOProducts.php';
require_once __DIR__ . '/../../dto/DTOProductCreate.php';
require_once __DIR__ . '/../../dto/DTOProductDetails.php';
require_once __DIR__ . '/../../dto/DTOProductMenu.php';

class DAOProductsImpl extends DataBase implements DAOProducts {

    private static ?DAOProductsImpl $instance = null;

    private function __construct() {
        parent::__construct();
    }

    public static function getInstance() : DAOProductsImpl {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * @param DTOProductCreate $dto
     * @return int
     */
    #[\Override]
    public function add(DTOProductCreate $dto) : int {
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
     * @return list<DTOProductMenu>
     */
    #[\Override]
    public function findByAllMenu() : array {
        return [];
    }

    /**
     * @param int $id
     * @return object | null
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
     * @param int $id
     * @return void
     */
    #[\Override]
    public function delete(int $id) : void {

    }

}