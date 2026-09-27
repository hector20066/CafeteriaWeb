<?php

require_once __DIR__ . '/../interfaces/UsersService.php';
require_once __DIR__ . '/../../model/dao/interfaces/DAOUsers.php';
require_once __DIR__ . '/../../model/dto/DTOUsersDetails.php';
require_once __DIR__ . '/../../model/dto/DTOUsersLogin.php';

class UsersServiceImpl implements UsersService {

    private DAOUsers $daoUsers;
    private BCryptEncryption $encrypt;

    public function __construct(DAOUsers $daoUsers) {
        $this->daoUsers = $daoUsers;
        $this->encrypt = new BCryptEncryption();
    }

    /**
     * @param string $name
     * @param string $email
     * @param string $plainPasswd
     * @param Roles $role
     * @return void
     */
    #[\Override]
    public function add(string $name, string $email, string $plainPasswd, Roles $role) : void {
        $hashPassword = $this->encrypt->hashPassword($plainPasswd);

        $dto = new DTOUsersCreate();
        $dto->setName($name);
        $dto->setEmail($email);
        $dto->setPasswd($hashPassword);
        $dto->setRole($role);

        $this->daoUsers->add($dto);
    }

    /**
     * @param string $email
     * @return DTOUsersDetails | null
     */
    #[\Override]
    public function findByEmail(string $email) : ?DTOUsersDetails {
        return $this->daoUsers->findByEmail($email);
    }

    /**
     * @param int $id
     * @return DTOUsersDetails | null
     */
    #[\Override]
    public function findById(int $id) : ?DTOUsersDetails {
        return $this->daoUsers->findById($id);
    }

    /**
     * @return list<DTOUsersDetails>
     */
    #[\Override]
    public function findByAll() : array {
        return $this->daoUsers->findByAll();
    }

    /**
     * @param string $email
     * @return DTOUsersLogin | null
     */
    #[\Override]
    public function findByLogin(string $email) : ?DTOUsersLogin {
        return $this->daoUsers->findByLogin($email);
    }

    /**
     * @param int $id
     * @return void
     */
    #[\Override]
    public function delete(int $id) : void {
        $this->daoUsers->delete($id);
    }

}