<?php

/**
 * @template T of object
 */
interface IListable {

    /**
     * @param int $id
     * @return T | null
     */
    public function findById(int $id) : ?object;

    /**
     * @return list<T>
     */
    public function findByAll() : array;

}