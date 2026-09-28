<?php

interface ConnectionProvider {

    public function getConnection() : PDO;

}
