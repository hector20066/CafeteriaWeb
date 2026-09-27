<?php

require_once __DIR__ . '/../../model/dto/DTOUsersDetails.php';
require_once __DIR__ . '/../../model/dto/DTOUsersLogin.php';

interface UsersService {

    /***
     * @param string $name
     * @param string $email
     * @param string $plainPasswd
     * @param Roles $role
     * @return void
     * @throws Exception
     */
    public function add(string $name, string $email, string $plainPasswd, Roles $role) : void;

    /**
     * @param string $email
     * @return DTOUsersDetails | null
     * @throws Exception
     */
    public function findByEmail(string $email) : ?DTOUsersDetails;

    /**
     * @param int $id
     * @return DTOUsersDetails | null
     * @throws Exception
     */
    public function findById(int $id) : ?DTOUsersDetails;

    /**
     * @return list<DTOUsersDetails>
     * @throws Exception
     */
    public function findByAll() : array;

    /**
     * @param string $email
     * @return DTOUsersLogin | null
     * @throws Exception
     */
    public function findByLogin(string $email) : ?DTOUsersLogin;

    /**
     * @param int $id
     * @return void
     * @throws Exception
     */
    public function delete(int $id) : void;

}
