<?php

use Decimal\Decimal;

require_once __DIR__ . '/../interfaces/DAOProducts.php';
require_once __DIR__ . '/../../dto/DTOProductCreate.php';
require_once __DIR__ . '/../../dto/DTOProductDetails.php';
require_once __DIR__ . '/../../dto/DTOProductMenu.php';
require_once __DIR__ . '/../../builder/dto/DTOProductDetailsBuilder.php';
require_once __DIR__ . '/../../builder/dto/DTOProductMenuBuilder.php';

class DAOProductsImpl implements DAOProducts {

    private PDO $connection;

    public function __construct(PDO $connection) {
        $this->connection = $connection;
    }

    /**
     * @param DTOProductCreate $dto
     * @return int
     */
    #[\Override]
    public function add(DTOProductCreate $dto) : int {
        $statement = $this->connection->prepare("INSERT INTO products(name, slug, id_category, price, image, description, brief_description) VALUES (:name, :slug, :id_category, :price, :image, :description, :brief_description);");

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

        return (int) $this->connection->lastInsertId();
    }

    /**
     * @param string $name
     * @return DTOProductDetails | null
     */
    #[\Override]
    public function findByName(string $name) : ?DTOProductDetails {
        $dto = null;
        $statement = $this->connection->prepare("SELECT p.id, p.name, p.description, p.price, c.name AS category, p.slug, p.image FROM products p LEFT JOIN categories c ON c.id = p.id_category WHERE p.name = :name;");
        $statement->bindParam(':name', $name);
        $statement->execute();

        if ($result = $statement->fetch()) {
            $dto = $this->getDTOProductDetails($result);
        }

        return $dto;
    }

    /**
     * @param string $slug
     * @return DTOProductDetails | null
     */
    #[\Override]
    public function findBySlug(string $slug) : ?DTOProductDetails {
        $dto = null;
        $statement = $this->connection->prepare("SELECT p.id, p.name, p.description, p.price, c.name AS category, p.slug, p.image FROM products p LEFT JOIN categories c ON c.id = p.id_category WHERE p.slug = :slug;");
        $statement->bindParam(':slug', $slug);
        $statement->execute();

        if ($result = $statement->fetch()) {
            $dto = $this->getDTOProductDetails($result);
        }

        return $dto;
    }

    /**
     * @param int $id
     * @return object | null
     */
    #[\Override]
    public function findById(int $id) : ?DTOProductDetails {
        $dto = null;
        $statement = $this->connection->prepare("SELECT p.id, p.name, p.description, p.price, c.name AS category, p.slug, p.image FROM products p LEFT JOIN categories c ON c.id = p.id_category WHERE p.id = :id;");
        $statement->bindParam(':id', $id);
        $statement->execute();

        if ($result = $statement->fetch()) {
            $dto = $this->getDTOProductDetails($result);
        }

        return $dto;
    }

    /**
     * @return list<DTOProductDetails>
     */
    #[\Override]
    public function findByAll() : array {
        $list = [];
        $statement = $this->connection->prepare("SELECT p.id, p.name, p.description, p.price, c.name AS category, p.slug, p.image FROM products p LEFT JOIN categories c ON c.id = p.id_category;");
        $statement->execute();

        while ($result = $statement->fetch()) {
            $dto = $this->getDTOProductDetails($result);
            $list[] = $dto;
        }

        return $list;
    }

    private function getDTOProductDetails(mixed $result) : DTOProductDetails {
        return new DTOProductDetailsBuilder()
            ->id((int) $result['id'])
            ->name((string) $result['name'])
            ->description((string) $result['description'])
            ->price(new Decimal($result['price']))
            ->category((string) $result['category'])
            ->slug((string) $result['slug'])
            ->image((string) $result['image'])
            ->build();
    }

    /**
     * @return list<DTOProductMenu>
     */
    #[\Override]
    public function findByAllMenu() : array {
        $list = [];
        $statement = $this->connection->prepare("SELECT p.id, p.name, p.brief_description, p.price, c.name AS category, p.slug, p.image FROM products p LEFT JOIN categories c ON c.id = p.id_category;");
        $statement->execute();

        while ($result = $statement->fetch()) {
            $dto = new DTOProductMenuBuilder()
                ->id((int) $result['id'])
                ->name((string) $result['name'])
                ->slug((string) $result['slug'])
                ->briefDescription((string) $result['brief_description'])
                ->price(new Decimal($result['price']))
                ->category((string) $result['category'])
                ->image((string) $result['image'])
                ->build();

            $list[] = $dto;
        }

        return $list;
    }

    /**
     * @param int $id
     * @return void
     */
    #[\Override]
    public function delete(int $id) : void {
        $statement = $this->connection->prepare("DELETE FROM products WHERE id = :id;");
        $statement->bindParam(':id', $id);
        $statement->execute();
    }

}
