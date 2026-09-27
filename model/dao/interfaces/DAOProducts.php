<?php

require_once __DIR__ . '/../../dto/DTOProductCreate.php';
require_once __DIR__ . '/../../dto/DTOProductDetails.php';
require_once __DIR__ . '/../../dto/DTOProductMenu.php';

/**
 * @extends IListable<DTOProductDetails>
 */
interface DAOProducts extends IListable, IRemovable {

    public function add(PDO $connection, DTOProductCreate $dto) : int;

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
     * @param PDO $connection
     * @param string $slug
     * @return DTOProductDetails | null
     */
    public function findBySlugTransaction(PDO $connection, string $slug) : ?DTOProductDetails;

    /**
     * @return list<DTOProductMenu>
     */
    public function findByAllMenu() : array;

}