<?php

require_once __DIR__ . '/../interfaces/DAOCharacteristics.php';
require_once __DIR__ . '/../../dto/DTOCharacteristics.php';

class DAOCharacteristicsImpl implements DAOCharacteristics {

    private PDO $connection;

    public function __construct(PDO $connection) {
        $this->connection = $connection;
    }

    /**
     * @param DTOCharacteristics $dto
     * @return void
     */
    #[\Override]
    public function add(DTOCharacteristics $dto) : void {
        $statement = $this->connection->prepare("INSERT INTO characteristics(id_product, feature) VALUES(:id_product, :feature);");
        $statement->bindParam(':id_product', $dto->getProductId());
        $statement->bindParam(':feature', $dto->getFeature());
        $statement->execute();
    }

    /**
     * @param int $id
     * @return object | null
     */
    #[\Override]
    public function findById(int $id) : ?DTOCharacteristics {
        $dto = null;
        $statement = $this->connection->prepare("SELECT * FROM characteristics WHERE id = :id;");
        $statement->bindParam(':id', $id);
        $statement->execute();

        if ($result = $statement->fetch()) {
            $dto = $this->getDTOCharacteristics($result);
        }

        return $dto;
    }

    /**
     * @return array
     */
    #[\Override]
    public function findByAll() : array {
        $list = [];
        $statement = $this->connection->prepare("SELECT * FROM characteristics;");
        $statement->execute();

        while ($result = $statement->fetch()) {
            $dto = $this->getDTOCharacteristics($result);
            $list[] = $dto;
        }

        return $list;
    }

    public function findByProduct(int $productId) : array {
        $list = [];
        $statement = $this->connection->prepare("SELECT * FROM characteristics WHERE id_product = :id_product;");
        $statement->execute();

        while ($result = $statement->fetch()) {
            $dto = $this->getDTOCharacteristics($result);
            $list[] = $dto;
        }

        return $list;
    }

    private function getDTOCharacteristics(mixed $result) : DTOCharacteristics {
        $dto = new DTOCharacteristics();
        $dto->setId((int) $result['id']);
        $dto->setProductId((int) $result['id_product']);
        $dto->setFeature((string) $result['feature']);

        return $dto;
    }

}
