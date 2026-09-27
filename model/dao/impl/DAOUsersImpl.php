<?php

require_once __DIR__ . '/../../../database/ConnectionProvider.php';
require_once __DIR__ . '/../interfaces/DAOUsers.php';
require_once __DIR__ . '/../../dto/DTOUsersCreate.php';
require_once __DIR__ . '/../../dto/DTOUsersDetails.php';
require_once __DIR__ . '/../../dto/DTOUsersLogin.php';
require_once __DIR__ . '/../../enums/Roles.php';

class DAOUsersImpl implements DAOUsers {

    private ConnectionProvider $provider;

    public function __construct(ConnectionProvider $provider) {
        $this->provider = $provider;
    }

    /**
     * @param DTOUsersCreate $dto
     * @return void
     * @throws Exception
     */
    #[\Override]
    public function add(DTOUsersCreate $dto) : void {
        try {
            $statement = $this->provider->getConnection()->prepare("INSERT INTO users(name, email, passwd, role) VALUES (:name, :email, :passwd, :role)");

            $name = $dto->getName();
            $email = $dto->getEmail();
            $passwd = $dto->getPasswd();
            $role = $dto->getRole()->value;

            $statement->bindParam(':name', $name);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':passwd', $passwd);
            $statement->bindParam(':role', $role);
            $statement->execute();
        } catch (Exception $e) {
            throw new Exception("Ha ocurrido un error al registrar el usuario", 0, $e);
        }
    }

    /**
     * @param string $email
     * @return DTOUsersDetails | null
     * @throws Exception
     */
    #[\Override]
    public function findByEmail(string $email) : ?DTOUsersDetails {
        try {
            $dto = null;
            $statement = $this->provider->getConnection()->prepare("SELECT id, name, email, role FROM users WHERE email = :email;");
            $statement->bindParam(':email', $email);
            $statement->execute();

            if ($result = $statement->fetch()) {
                $dto = $this->getDTOUserDetails($result);
            }

            return $dto;
        } catch (Exception $e) {
            throw new Exception("Ha ocurrido un error al buscar el usuario con correo: " . $email, 0, $e);
        }
    }

    /**
     * @param int $id
     * @return object | null
     * @throws Exception
     */
    #[\Override]
    public function findById(int $id) : ?DTOUsersDetails {
        try {
            $dto = null;
            $statement = $this->provider->getConnection()->prepare("SELECT id, name, email, role FROM users WHERE id = :id;");
            $statement->bindParam(':id', $id);
            $statement->execute();

            if ($result = $statement->fetch()) {
                $dto = $this->getDTOUserDetails($result);
            }

            return $dto;
        } catch (Exception $e) {
            throw new Exception("Ha ocurrido un error al buscar el usuario con id: " . $id, 0, $e);
        }
    }

    /**
     * @return list<DTOUsersDetails>
     * @throws Exception
     */
    #[\Override]
    public function findByAll() : array {
        try {
            $list = [];
            $statement = $this->provider->getConnection()->prepare("SELECT id, name, email, role FROM users;");
            $statement->execute();

            while ($result = $statement->fetch()) {
                $dto = $this->getDTOUserDetails($result);
                $list[] = $dto;
            }

            return $list;
        } catch (Exception $e) {
            throw new Exception("Ha ocurrido un error al listar los usuarios", 0, $e);
        }
    }

    /**
     * @param mixed $result
     * @return DTOUsersDetails
     * @throws Exception
     */
    private function getDTOUserDetails(mixed $result) : DTOUsersDetails {
        $dto = new DTOUsersDetails();
        $dto->setId((int) $result['id']);
        $dto->setName((string) $result['name']);
        $dto->setEmail((string) $result['email']);
        $dto->setRole(Roles::from($result['role']));

        return $dto;
    }

    /**
     * @param string $email
     * @return DTOUsersLogin | null
     * @throws Exception
     */
    #[\Override]
    public function findByLogin(string $email) : ?DTOUsersLogin {
        try {
            $dto = null;
            $statement = $this->provider->getConnection()->prepare("SELECT id, name, email, role, passwd FROM users WHERE email = :email;");
            $statement->bindParam(':email', $email);
            $statement->execute();

            if ($result = $statement->fetch()) {
                $dto = new DTOUsersLogin();
                $dto->setId((int)$result['id']);
                $dto->setName((string)$result['name']);
                $dto->setEmail((string)$result['email']);
                $dto->setRole(Roles::from($result['role']));
                $dto->setPasswd((string)$result['passwd']);
            }

            return $dto;
        } catch (Exception $e) {
            throw new Exception("Ha ocurrido un error al buscar el usuario con correo: " . $email, 0, $e);
        }
    }

    /**
     * @param int $id
     * @return void
     * @throws Exception
     */
    #[\Override]
    public function delete(int $id) : void {
        try {
            $statement = $this->provider->getConnection()->prepare("DELETE FROM users WHERE id = :id;");
            $statement->bindParam(':id', $id);
            $statement->execute();
        } catch (Exception $e) {
            throw new Exception("Ha ocurrido un error al eliminar el usuario con id: " . $id, 0, $e);
        }
    }

}
