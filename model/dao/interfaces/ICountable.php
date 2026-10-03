<?php

interface ICountable {

    /**
     * @return int
     * @throws Exception
     */
    public function countRecords() : int;

}