<?php

interface ConnectionProvider {

    /**
     * @return PDO
     */
    public function getConnection() : PDO;

}
