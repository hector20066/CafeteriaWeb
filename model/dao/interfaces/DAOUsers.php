<?php

require_once __DIR__ . '/../../dto/DTOUsersCreate.php';
require_once __DIR__ . '/../../dto/DTOUsersDetails.php';
require_once __DIR__ . '/../../dto/DTOUsersLogin.php';

/**
 * @extends IListable<DTOUsersDetails>
 */
interface DAOUsers extends IListable, IRemovable {

    public function add(DTOUsersCreate $dto) : void;

    /**
     * @param string $email
     * @return DTOUsersDetails | null
     */
    public function findByEmail(string $email) : ?DTOUsersDetails;

    /**
     * @param string $email
     * @return DTOUsersLogin | null
     */
    public function findByLogin(string $email) : ?DTOUsersLogin;

}