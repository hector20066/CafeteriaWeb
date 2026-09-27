<?php

require_once __DIR__ . '/../interfaces/CategoriesService.php';
require_once __DIR__ . '/../../model/dao/interfaces/DAOCategories.php';
require_once __DIR__ . '/../../model/dto/DTOCategory.php';

class CategoriesServiceImpl implements CategoriesService {

    private DAOCategories $daoCategories;

    public function __construct(DAOCategories $daoCategories) {
        $this->daoCategories = $daoCategories;
    }

    /**
     * @param string $name
     * @return void
     * @throws Exception
     */
    #[\Override]
    public function add(string $name) : void {
        $dto = new DTOCategory();
        $dto->setName($name);

        $this->daoCategories->add($dto);
    }

    /**
     * @param int $id
     * @return DTOCategory | null
     * @throws Exception
     */
    #[\Override]
    public function findById(int $id) : ?DTOCategory {
        $dto = $this->daoCategories->findById($id);

        if ($dto === null) {
            throw new Exception("No se ha encontrado el usuario con id: " . $id);
        }

        return $dto;
    }

    /**
     * @return list<DTOCategory>
     * @throws Exception
     */
    #[\Override]
    public function findByAll() : array {
        return $this->daoCategories->findByAll();
    }

}
