<?php

/**
 * @template T
 */
interface IListable {

    /**
     * @param int $id
     * @return object | null
     */
    public function findById(int $id) : ?object;
    public function findByAll() : array;

}