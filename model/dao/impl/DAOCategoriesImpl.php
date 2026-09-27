<?php

require_once __DIR__ . '/../interfaces/DAOCategories.php';
require_once __DIR__ . '/../../dto/DTOCategory.php';

class DAOCategoriesImpl implements DAOCategories {

    private PDO $connection;

    public function __construct(PDO $connection) {
        $this->connection = $connection;
    } 

    /**
     * @param DTOCategory $dto
     * @return void
     */
    #[\Override]
    public function add(DTOCategory $dto) : void {
        $statement = $this->connection->prepare("INSERT INTO categories(name) VALUES (:name);");
        $statement->bindParam(':name', $dto->getName());
        $statement->execute();
    }

    /**
     * @param int $id
     * @return object | null
     */
    #[\Override]
    public function findById(int $id) : ?DTOCategory {
        $dto = null;
        $statement = $this->connection->prepare("SELECT id, name FROM categories WHERE id = :id;");
        $statement->bindParam(':id', $id);
        $statement->execute();

        if ($result = $statement->fetch()) {
            $dto = $this->getDTOCategory($result);
        }

        return $dto;
    }

    /**
     * @return list<DTOCategory>
     */
    #[\Override]
    public function findByAll() : array {
        $list = [];
        $statement = $this->connection->prepare("SELECT id, name FROM categories;");
        $statement->execute();

        while ($result = $statement->fetch()) {
            $dto = $this->getDTOCategory($result);
            $list[] = $dto;
        }

        return $list;
    }

    private function getDTOCategory(mixed $result) : DTOCategory {
        $dto = new DTOCategory();
        $dto->setId((int) $result['id']);
        $dto->setName((string) $result['name']);

        return $dto;
    }

}
