<?php

require_once __DIR__ . '/../../model/dto/DTOUsersDetails.php';
require_once __DIR__ . '/../../model/dto/DTOUsersLogin.php';

class UsersServiceImpl implements UsersService {

    /**
     * @param string $name
     * @param string $email
     * @param string $plainPasswd
     * @param Roles $role
     * @return void
     */
    #[\Override]
    public function add(string $name, string $email, string $plainPasswd, Roles $role) : void {

    }

    /**
     * @param string $email
     * @return DTOUsersDetails | null
     */
    #[\Override]
    public function findByEmail(string $email) : ?DTOUsersDetails {
        return null;
    }

    /**
     * @param int $id
     * @return DTOUsersDetails | null
     */
    #[\Override]
    public function findById(int $id) : ?DTOUsersDetails {
        return null;
    }

    /**
     * @return list<DTOUsersDetails>
     */
    #[\Override]
    public function findByAll() : array {
        return [];
    }

    /**
     * @param string $email
     * @return DTOUsersLogin | null
     */
    #[\Override]
    public function findByLogin(string $email) : ?DTOUsersLogin {
        return null;
    }

    /**
     * @param int $id
     * @return void
     */
    #[\Override]
    public function delete(int $id) : void {

    }

}