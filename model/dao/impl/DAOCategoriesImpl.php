<?php

require_once __DIR__ . '/../../../database/ConnectionProvider.php';
require_once __DIR__ . '/../interfaces/DAOCategories.php';
require_once __DIR__ . '/../../dto/DTOCategory.php';

class DAOCategoriesImpl implements DAOCategories {

    private ConnectionProvider $provider;

    public function __construct(ConnectionProvider $provider) {
        $this->provider = $provider;
    } 

    /**
     * @param DTOCategory $dto
     * @return void
     */
    #[\Override]
    public function add(DTOCategory $dto) : void {
        $statement = $this->provider->getConnection()->prepare("INSERT INTO categories(name) VALUES (:name);");

        $name = $dto->getName();

        $statement->bindParam(':name', $name);
        $statement->execute();
    }

    /**
     * @param int $id
     * @return object | null
     */
    #[\Override]
    public function findById(int $id) : ?DTOCategory {
        $dto = null;
        $statement = $this->provider->getConnection()->prepare("SELECT id, name FROM categories WHERE id = :id;");
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
        $statement = $this->provider->getConnection()->prepare("SELECT id, name FROM categories;");
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
