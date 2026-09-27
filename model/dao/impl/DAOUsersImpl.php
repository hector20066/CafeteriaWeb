<?php

require_once __DIR__ . '/../interfaces/DAOUsers.php';
require_once __DIR__ . '/../../dto/DTOUsersCreate.php';
require_once __DIR__ . '/../../dto/DTOUsersDetails.php';
require_once __DIR__ . '/../../dto/DTOUsersLogin.php';

class DAOUsersImpl implements DAOUsers {

    private PDO $connection;

    public function __construct(PDO $connection) {
        $this->connection = $connection;
    }

    /**
     * @param DTOUsersCreate $dto
     * @return void
     */
    #[\Override]
    public function add(DTOUsersCreate $dto) : void {
        $statement = $this->connection->prepare("INSERT INTO users(name, email, passwd, role) VALUES (:name, :email, :passwd, :role)");
        $statement->bindParam(':name', $dto->getName());
        $statement->bindParam(':email', $dto->getEmail());
        $statement->bindParam(':passwd', $dto->getPasswd());
        $statement->bindParam(':role', $dto->getRole()->value);
        $statement->execute(); 
    }

    /**
     * @param string $email
     * @return DTOUsersDetails | null
     */
    #[\Override]
    public function findByEmail(string $email) : ?DTOUsersDetails {
        $dto = null;
        $statement = $this->connection->prepare("SELECT id, name, email, role FROM users WHERE email = :email;");
        $statement->bindParam(':email', $email);
        $statement->execute();

        if ($result = $statement->fetch()) {
            $dto = $this->getDTOUserDetails($result);
        }

        return $dto;
    }

    /**
     * @param int $id
     * @return object | null
     */
    #[\Override]
    public function findById(int $id) : ?DTOUsersDetails {
        $dto = null;
        $statement = $this->connection->prepare("SELECT id, name, email, role FROM users WHERE id = :id;");
        $statement->bindParam(':id', $id);
        $statement->execute();

        if ($result = $statement->fetch()) {
            $dto = $this->getDTOUserDetails($result);
        }

        return $dto;
    }

    /**
     * @return list<DTOUsersDetails>
     */
    #[\Override]
    public function findByAll() : array {
        $list = [];
        $statement = $this->connection->prepare("SELECT id, name, email, role FROM users;");
        $statement->execute();

        while ($result = $statement->fetch()) {
            $dto = $this->getDTOUserDetails($result);
            $list[] = $dto;
        }

        return $list;
    }

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
     */
    #[\Override]
    public function findByLogin(string $email) : ?DTOUsersLogin {
        $dto = null;
        $statement = $this->connection->prepare("SELECT id, name, email, role, passwd FROM users WHERE email = :email;");
        $statement->bindParam(':email', $email);
        $statement->execute();

        if ($result = $statement->fetch()) {
            $dto = new DTOUsersLogin();
            $dto->setId((int) $result['id']);
            $dto->setName((string) $result['name']);
            $dto->setEmail((string) $result['email']);
            $dto->setRole(Roles::from($result['role']));
            $dto->setPasswd((string) $result['passwd']);
        }

        return $dto;
    }

    /**
     * @param int $id
     * @return void
     */
    #[\Override]
    public function delete(int $id) : void {
        $statement = $this->connection->prepare("DELETE FROM users WHERE id = :id;");
        $statement->bindParam(':id', $id);
        $statement->execute();
    }

}
