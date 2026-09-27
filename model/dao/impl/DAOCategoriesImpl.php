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
     * @throws Exception
     */
    #[\Override]
    public function add(DTOCategory $dto) : void {
        try {
            $statement = $this->provider->getConnection()->prepare("INSERT INTO categories(name) VALUES (:name);");

            $name = $dto->getName();

            $statement->bindParam(':name', $name);
            $statement->execute();
        } catch (Exception $e) {
            throw new Exception("Ha ocurrido un error al registrar la categoría", 0, $e);
        }
    }

    /**
     * @param int $id
     * @return object | null
     * @throws Exception
     */
    #[\Override]
    public function findById(int $id) : ?DTOCategory {
        try {
            $dto = null;
            $statement = $this->provider->getConnection()->prepare("SELECT id, name FROM categories WHERE id = :id;");
            $statement->bindParam(':id', $id);
            $statement->execute();

            if ($result = $statement->fetch()) {
                $dto = $this->getDTOCategory($result);
            }

            return $dto;
        } catch (Exception $e) {
            throw new Exception("Ha ocurrido un error al buscar la categoría por el id: " . $id, 0, $e);
        }
    }

    /**
     * @return list<DTOCategory>
     * @throws Exception
     */
    #[\Override]
    public function findByAll() : array {
        try {
            $list = [];
            $statement = $this->provider->getConnection()->prepare("SELECT id, name FROM categories;");
            $statement->execute();

            while ($result = $statement->fetch()) {
                $dto = $this->getDTOCategory($result);
                $list[] = $dto;
            }

            return $list;
        } catch (Exception $e) {
            throw new Exception("Ha ocurrido un error al listar las categorías", 0, $e);
        }
    }

    private function getDTOCategory(mixed $result) : DTOCategory {
        $dto = new DTOCategory();
        $dto->setId((int) $result['id']);
        $dto->setName((string) $result['name']);

        return $dto;
    }

}
