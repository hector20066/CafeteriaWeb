<?php

use Decimal\Decimal;

require_once __DIR__ . '/../../database/ConnectionProvider.php';
require_once __DIR__ . '/../interfaces/ProductsService.php';
require_once __DIR__ . '/../interfaces/CharacteristicsService.php';
require_once __DIR__ . '/../../model/dao/interfaces/DAOProducts.php';
require_once __DIR__ . '/../../model/dto/DTOProductDetails.php';
require_once __DIR__ . '/../../model/dto/DTOProductMenu.php';
require_once __DIR__ . '/../../model/builder/dto/DTOProductCreateBuilder.php';

class ProductsServiceImpl implements ProductsService {

    private DAOProducts $daoProducts;
    private CharacteristicsService $characteristicsService;
    private ConnectionProvider $provider;

    public function __construct(DAOProducts $daoProducts, CharacteristicsService $characteristicsService, ConnectionProvider $provider) {
        $this->daoProducts = $daoProducts;
        $this->characteristicsService = $characteristicsService;
        $this->provider = $provider;
    }

    /**
     * @param string $name
     * @param string $slug
     * @param int $categoryId
     * @param Decimal $price
     * @param string $image
     * @param string $description
     * @param string $briefDescription
     * @param array $features
     * @throws Exception
     */
    #[\Override]
    public function add(string $name, string $slug, int $categoryId, Decimal $price, string $image, string $description,
                        string $briefDescription, array $features) : void {
        $connection = null;

        try {
            $connection = $this->provider->getConnection();
            $connection->beginTransaction();

            if ($this->daoProducts->findBySlugTransaction($connection, $slug) !== null) {
                throw new Exception("Este producto ya se encuentra registrado");
            }

            if ($features === []) {
                throw new Exception("Debe ingresar las características del producto");
            }

            $productDto = $this->getDTOProductCreate($name, $slug, $categoryId, $price, $image, $description, $briefDescription);

            $productId = $this->daoProducts->add($connection, $productDto);

            if ($productId === 0) {
                throw new Exception("No se ha podido registrar el producto");
            }

            foreach ($features as $feature) {
                $this->characteristicsService->add($connection, $productId, $feature);
            }

            $connection->commit();
        } catch (Exception $e) {
            if ($connection !== null && $connection->inTransaction()) {
                $connection->rollBack();
            }

            throw $e;
        }
    }

    private function getDTOProductCreate(string $name, string $slug, int $categoryId, Decimal $price, string $image,
                                         string $description, string $briefDescription) : DTOProductCreate {
        return new DTOProductCreateBuilder()
            ->name($name)
            ->slug($slug)
            ->categoryId($categoryId)
            ->price($price)
            ->image($image)
            ->description($description)
            ->briefDescription($briefDescription)
            ->build();
    }

    /**
     * @param string $name
     * @return DTOProductDetails | null
     * @throws Exception
     */
    #[\Override]
    public function findByName(string $name) : ?DTOProductDetails {
        $dto = $this->daoProducts->findByName($name);

        if ($dto === null) {
            throw new Exception("No se ha encontrado el producto con nombre: " . $name);
        }

        return $dto;
    }

    /**
     * @param string $slug
     * @return DTOProductDetails | null
     * @throws Exception
     */
    #[\Override]
    public function findBySlug(string $slug) : ?DTOProductDetails {
        $dto = $this->daoProducts->findBySlug($slug);

        if ($dto === null) {
            throw new Exception("No se ha encontrado el producto con slug: " . $slug);
        }

        return $dto;
    }

    /**
     * @param int $id
     * @return DTOProductDetails | null
     * @throws Exception
     */
    #[\Override]
    public function findById(int $id) : ?DTOProductDetails {
        $dto = $this->daoProducts->findById($id);

        if ($dto === null) {
            throw new Exception("No se ha encontrado el producto con id: " . $id);
        }

        return $dto;
    }

    /**
     * @return list<DTOProductDetails>
     * @throws Exception
     */
    #[\Override]
    public function findByAll() : array {
        return $this->daoProducts->findByAll();
    }

    /**
     * @return list<DTOProductMenu>
     * @throws Exception
     */
    #[\Override]
    public function findByAllMenu() : array {
        return $this->daoProducts->findByAllMenu();
    }

    /**
     * @param int $id
     * @return void
     * @throws Exception
     */
    #[\Override]
    public function delete(int $id) : void {
        $this->daoProducts->delete($id);
    }

}
