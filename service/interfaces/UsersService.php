<?php

require_once __DIR__ . '/../../model/dto/DTOUsersDetails.php';
require_once __DIR__ . '/../../model/dto/DTOUsersLogin.php';

interface UsersService {

    public function add(string $name, string $email, string $plainPasswd, Roles $role) : void;

    /**
     * @param string $email
     * @return DTOUsersDetails | null
     */
    public function findByEmail(string $email) : ?DTOUsersDetails;

    /**
     * @param int $id
     * @return DTOUsersDetails | null
     */
    public function findById(int $id) : ?DTOUsersDetails;

    /**
     * @return list<DTOUsersDetails>
     */
    public function findByAll() : array;

    /**
     * @param string $email
     * @return DTOUsersLogin | null
     */
    public function findByLogin(string $email) : ?DTOUsersLogin;
    public function delete(int $id) : void;

}
