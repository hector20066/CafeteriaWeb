<?php

interface IRemovable {

    /**
     * @param int $id
     * @return void
     * @throws Exception
     */
    public function delete(int $id) : void;

}