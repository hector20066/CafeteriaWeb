<?php

class DAOUsersImpl implements DAOUsers {

    /**
     * @param DTOUsersCreate $dto
     * @return void
     */
    #[\Override]
    public function add(DTOUsersCreate $dto) : void {
        
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
     * @param string $email
     * @return DTOUsersLogin | null
     */
    #[\Override]
    public function findByLogin(string $email) : ?DTOUsersLogin {
        return null;
    }

    /**
     * @param int $id
     * @return object | null
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
     * @param int $id
     * @return void
     */
    #[\Override]
    public function delete(int $id) : void {

    }

}