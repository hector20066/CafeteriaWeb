<?php

require_once __DIR__ . '/../../../database/ConnectionProvider.php';
require_once __DIR__ . '/../interfaces/DAOProducts.php';
require_once __DIR__ . '/../../dto/DTOProductCreate.php';
require_once __DIR__ . '/../../dto/DTOProductDetails.php';
require_once __DIR__ . '/../../dto/DTOProductMenu.php';
require_once __DIR__ . '/../../builder/dto/DTOProductDetailsBuilder.php';
require_once __DIR__ . '/../../builder/dto/DTOProductMenuBuilder.php';

class DAOProductsImpl implements DAOProducts {

    private ConnectionProvider $provider;

    public function __construct(ConnectionProvider $provider) {
        $this->provider = $provider;
    }

    /**
     * @param PDO $connection
     * @param DTOProductCreate $dto
     * @return int
     * @throws Exception
     */
    #[\Override]
    public function add(PDO $connection, DTOProductCreate $dto) : int {
        try {
            $statement = $connection->prepare("INSERT INTO products(name, slug, id_category, price, image, description, brief_description) VALUES (:name, :slug, :id_category, :price, :image, :description, :brief_description);");

            $name = $dto->getName();
            $slug = $dto->getSlug();
            $categoryId = $dto->getCategoryId();
            $price = $dto->getPrice();
            $image = $dto->getImage();
            $description = $dto->getDescription();
            $briefDescription = $dto->getBriefDescription();

            $statement->bindParam(':name', $name);
            $statement->bindParam(':slug', $slug);
            $statement->bindParam(':id_category', $categoryId);
            $statement->bindParam(':price', $price);
            $statement->bindParam(':image', $image);
            $statement->bindParam('description', $description);
            $statement->bindParam('brief_description', $briefDescription);

            $statement->execute();

            return (int)$connection->lastInsertId();
        } catch (Exception $e) {
            throw new Exception("Ha ocurrido un error al registrar el producto", 0, $e);
        }
    }

    /**
     * @param string $name
     * @return DTOProductDetails | null
     * @throws Exception
     */
    #[\Override]
    public function findByName(string $name) : ?DTOProductDetails {
        try {
            $dto = null;
            $statement = $this->provider->getConnection()->prepare("SELECT p.id, p.name, p.description, p.price, c.name AS category, p.slug, p.image FROM products p LEFT JOIN categories c ON c.id = p.id_category WHERE p.name = :name;");
            $statement->bindParam(':name', $name);
            $statement->execute();

            if ($result = $statement->fetch()) {
                $dto = $this->getDTOProductDetails($result);
            }

            return $dto;
        } catch (Exception $e) {
            throw new Exception("Ha ocurrido un error al buscar el producto con nombre: " . $name, 0, $e);
        }
    }

    /**
     * @param string $slug
     * @return DTOProductDetails | null
     * @throws Exception
     */
    #[\Override]
    public function findBySlug(string $slug) : ?DTOProductDetails {
        try {
            $dto = null;
            $statement = $this->provider->getConnection()->prepare("SELECT p.id, p.name, p.description, p.price, c.name AS category, p.slug, p.image FROM products p LEFT JOIN categories c ON c.id = p.id_category WHERE p.slug = :slug;");
            $statement->bindParam(':slug', $slug);
            $statement->execute();

            if ($result = $statement->fetch()) {
                $dto = $this->getDTOProductDetails($result);
            }

            return $dto;
        } catch (Exception $e) {
            throw new Exception("Ha ocurrido un error al buscar el producto con slug: " . $slug, 0, $e);
        }
    }

    /**
     * @param PDO $connection
     * @param string $slug
     * @return DTOProductDetails | null
     * @throws Exception
     */
    #[\Override]
    public function findBySlugTransaction(PDO $connection, string $slug) : ?DTOProductDetails {
        try {
            $dto = null;
            $statement = $connection->prepare("SELECT p.id, p.name, p.description, p.price, c.name AS category, p.slug, p.image FROM products p LEFT JOIN categories c ON c.id = p.id_category WHERE p.slug = :slug;");
            $statement->bindParam(':slug', $slug);
            $statement->execute();

            if ($result = $statement->fetch()) {
                $dto = $this->getDTOProductDetails($result);
            }

            return $dto;
        } catch (Exception $e) {
            throw new Exception("Ha ocurrido un error al buscar el producto con slug: " . $slug, 0, $e);
        }
    }

    /**
     * @param int $id
     * @return object | null
     * @throws Exception
     */
    #[\Override]
    public function findById(int $id) : ?DTOProductDetails {
        try {
            $dto = null;
            $statement = $this->provider->getConnection()->prepare("SELECT p.id, p.name, p.description, p.price, c.name AS category, p.slug, p.image FROM products p LEFT JOIN categories c ON c.id = p.id_category WHERE p.id = :id;");
            $statement->bindParam(':id', $id);
            $statement->execute();

            if ($result = $statement->fetch()) {
                $dto = $this->getDTOProductDetails($result);
            }

            return $dto;
        } catch (Exception $e) {
            throw new Exception("Ha ocurrido un error al buscar el producto con id: " . $id, 0, $e);
        }
    }

    /**
     * @return list<DTOProductDetails>
     * @throws Exception
     */
    #[\Override]
    public function findByAll() : array {
        try {
            $list = [];
            $statement = $this->provider->getConnection()->prepare("SELECT p.id, p.name, p.description, p.price, c.name AS category, p.slug, p.image FROM products p LEFT JOIN categories c ON c.id = p.id_category;");
            $statement->execute();

            while ($result = $statement->fetch()) {
                $dto = $this->getDTOProductDetails($result);
                $list[] = $dto;
            }

            return $list;
        } catch (Exception $e) {
            throw new Exception("Ha ocurrido un error al listar los productos", 0, $e);
        }
    }

    /**
     * @param mixed $result
     * @return DTOProductDetails
     * @throws Exception
     */
    private function getDTOProductDetails(mixed $result) : DTOProductDetails {
        return new DTOProductDetailsBuilder()
            ->id((int) $result['id'])
            ->name((string) $result['name'])
            ->description((string) $result['description'])
            ->price((string) $result['price'])
            ->category((string) $result['category'])
            ->slug((string) $result['slug'])
            ->image((string) $result['image'])
            ->build();
    }

    /**
     * @param string $category
     * @return list<DTOProductMenu>
     * @throws Exception
     */
    #[\Override]
    public function findByCategory(string $category) : array {
        try {
            $list = [];
            $statement = $this->provider->getConnection()->prepare("SELECT p.id, p.name, p.brief_description, p.price, c.name AS category, p.slug, p.image FROM products p LEFT JOIN categories c ON c.id = p.id_category WHERE c.name = :category;");
            $statement->bindParam(':category', $category);
            $statement->execute();

            while ($result = $statement->fetch()) {
                $dto = $this->getDTOProductMenu($result);
                $list[] = $dto;
            }

            return $list;
        } catch (Exception $e) {
            throw new Exception("Ha ocurrido un error al listar los productos para el menú", 0, $e);
        }
    }

    /**
     * @return list<DTOProductMenu>
     * @throws Exception
     */
    #[\Override]
    public function findByAllMenu() : array {
        try {
            $list = [];
            $statement = $this->provider->getConnection()->prepare("SELECT p.id, p.name, p.brief_description, p.price, c.name AS category, p.slug, p.image FROM products p LEFT JOIN categories c ON c.id = p.id_category;");
            $statement->execute();

            while ($result = $statement->fetch()) {
                $dto = $this->getDTOProductMenu($result);
                $list[] = $dto;
            }

            return $list;
        } catch (Exception $e) {
            throw new Exception("Ha ocurrido un error al listar los productos para el menú", 0, $e);
        }
    }

    private function getDTOProductMenu(mixed $result) : DTOProductMenu {
        return new DTOProductMenuBuilder()
            ->id((int)$result['id'])
            ->name((string)$result['name'])
            ->slug((string)$result['slug'])
            ->briefDescription((string)$result['brief_description'])
            ->price((string) $result['price'])
            ->category((string)$result['category'])
            ->image((string)$result['image'])
            ->build();
    }

    /**
     * @param int $id
     * @return void
     * @throws Exception
     */
    #[\Override]
    public function delete(int $id) : void {
        try {
            $statement = $this->provider->getConnection()->prepare("DELETE FROM products WHERE id = :id;");
            $statement->bindParam(':id', $id);
            $statement->execute();
        } catch (Exception $e) {
            throw new Exception("Ha ocurrido un error al eliminar el producto con id: " . $id, 0, $e);
        }
    }

    /**
     * @return int
     */
    #[\Override]
    public function countRecords() : int {
        return 0;
    }

}
