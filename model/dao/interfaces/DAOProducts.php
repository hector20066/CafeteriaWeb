<?php

require_once __DIR__ . '/../../dto/DTOProductCreate.php';
require_once __DIR__ . '/../../dto/DTOProductDetails.php';
require_once __DIR__ . '/../../dto/DTOProductMenu.php';
require_once __DIR__ . '/IListable.php';
require_once __DIR__ . '/IRemovable.php';

/**
 * @extends IListable<DTOProductDetails>
 */
interface DAOProducts extends IListable, IRemovable {

    /**
     * @param PDO $connection
     * @param DTOProductCreate $dto
     * @return int
     * @throws Exception
     */
    public function add(PDO $connection, DTOProductCreate $dto) : int;

    /**
     * @param string $name
     * @return DTOProductDetails | null
     * @throws Exception
     */
    public function findByName(string $name) : ?DTOProductDetails;

    /**
     * @param string $slug
     * @return DTOProductDetails | null
     * @throws Exception
     */
    public function findBySlug(string $slug) : ?DTOProductDetails;

    /**
     * @param PDO $connection
     * @param string $slug
     * @return DTOProductDetails | null
     * @throws Exception
     */
    public function findBySlugTransaction(PDO $connection, string $slug) : ?DTOProductDetails;

    /**
     * @return list<DTOProductMenu>
     * @throws Exception
     */
    public function findByAllMenu() : array;

}