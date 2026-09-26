<?php

/**
 * @extends IListable<DTOProductDetails>
 */
interface DAOProducts extends IListable, IRemovable {

    public function add(DTOProductCreate $dto) : int;

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
     * @return list<DTOProductMenu>
     */
    public function findByAllMenu() : array;

}