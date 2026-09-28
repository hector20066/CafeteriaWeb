<?php

require_once __DIR__ . '/../../dto/DTOUsersCreate.php';
require_once __DIR__ . '/../../dto/DTOUsersDetails.php';
require_once __DIR__ . '/../../dto/DTOUsersLogin.php';
require_once __DIR__ . '/IListable.php';
require_once __DIR__ . '/IRemovable.php';

/**
 * @extends IListable<DTOUsersDetails>
 */
interface DAOUsers extends IListable, IRemovable {

    /**
     * @param DTOUsersCreate $dto
     * @return void
     * @throws Exception
     */
    public function add(DTOUsersCreate $dto) : void;

    /**
     * @param string $email
     * @return DTOUsersDetails | null
     * @throws Exception
     */
    public function findByEmail(string $email) : ?DTOUsersDetails;

    /**
     * @param string $email
     * @return DTOUsersLogin | null
     * @throws Exception
     */
    public function findByLogin(string $email) : ?DTOUsersLogin;

}
