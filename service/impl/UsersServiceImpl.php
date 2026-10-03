<?php

require_once __DIR__ . '/../interfaces/UsersService.php';
require_once __DIR__ . '/../../model/dao/interfaces/DAOUsers.php';
require_once __DIR__ . '/../../model/dto/DTOUsersDetails.php';
require_once __DIR__ . '/../../model/dto/DTOUsersLogin.php';
require_once __DIR__ . '/../../model/dto/DTOUsersCreate.php';
require_once __DIR__ . '/../../model/enums/Roles.php';
require_once __DIR__ . '/../../security/BCryptEncryption.php';

class UsersServiceImpl implements UsersService {

    private DAOUsers $daoUsers;
    private BCryptEncryption $encrypt;

    public function __construct(DAOUsers $daoUsers, BCryptEncryption $encrypt) {
        $this->daoUsers = $daoUsers;
        $this->encrypt = $encrypt;
    }

    /**
     * @param string $name
     * @param string $email
     * @param string $plainPasswd
     * @param Roles $role
     * @return void
     * @throws Exception
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
     * @throws Exception
     */
    #[\Override]
    public function findByEmail(string $email) : ?DTOUsersDetails {
        $dto = $this->daoUsers->findByEmail($email);

        if ($dto === null) {
            throw new Exception("No se ha encontrado el usuario con correo: " . $email);
        }

        return $dto;
    }

    /**
     * @param int $id
     * @return DTOUsersDetails | null
     * @throws Exception
     */
    #[\Override]
    public function findById(int $id) : ?DTOUsersDetails {
        $dto = $this->daoUsers->findById($id);

        if ($dto === null) {
            throw new Exception("No se ha encontrado el usuario con id: " . $id);
        }

        return $dto;
    }

    /**
     * @return list<DTOUsersDetails>
     * @throws Exception
     */
    #[\Override]
    public function findByAll() : array {
        return $this->daoUsers->findByAll();
    }

    /**
     * @param string $email
     * @return DTOUsersLogin | null
     * @throws Exception
     */
    #[\Override]
    public function findByLogin(string $email) : ?DTOUsersLogin {
        return $this->daoUsers->findByLogin($email);
    }

    /**
     * @param int $id
     * @return void
     * @throws Exception
     */
    #[\Override]
    public function delete(int $id) : void {
        $this->daoUsers->delete($id);
    }

    /**
     * @return int
     * @throws Exception
     */
    #[\Override]
    public function countRecords() : int {
        return $this->daoUsers->countRecords();
    }

}
