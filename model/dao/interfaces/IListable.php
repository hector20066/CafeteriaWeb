<?php

/**
 * @template T of object
 */
interface IListable {

    /**
     * @param int $id
     * @return T | null
     * @throws Exception
     */
    public function findById(int $id) : ?object;

    /**
     * @return list<T>
     * @throws Exception
     */
    public function findByAll() : array;

}
