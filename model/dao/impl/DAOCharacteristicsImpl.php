<?php

require_once __DIR__ . '/../../../database/ConnectionProvider.php';
require_once __DIR__ . '/../interfaces/DAOCharacteristics.php';
require_once __DIR__ . '/../../dto/DTOCharacteristics.php';

class DAOCharacteristicsImpl implements DAOCharacteristics {

    private ConnectionProvider $provider;

    public function __construct(ConnectionProvider $provider) {
        $this->provider = $provider;
    }

    /**
     * @param PDO $connection
     * @param DTOCharacteristics $dto
     * @return void
     */
    #[\Override]
    public function add(PDO $connection, DTOCharacteristics $dto) : void {
        $statement = $connection->prepare("INSERT INTO characteristics(id_product, feature) VALUES (:id_product, :feature);");

        $productId = $dto->getProductId();
        $feature = $dto->getFeature();

        $statement->bindParam(':id_product', $productId);
        $statement->bindParam(':feature', $feature);
        $statement->execute();
    }

    /**
     * @param int $id
     * @return object | null
     */
    #[\Override]
    public function findById(int $id) : ?DTOCharacteristics {
        $dto = null;
        $statement = $this->provider->getConnection()->prepare("SELECT * FROM characteristics WHERE id = :id;");
        $statement->bindParam(':id', $id);
        $statement->execute();

        if ($result = $statement->fetch()) {
            $dto = $this->getDTOCharacteristics($result);
        }

        return $dto;
    }

    /**
     * @return list<DTOCharacteristics>
     */
    #[\Override]
    public function findByAll() : array {
        $list = [];
        $statement = $this->provider->getConnection()->prepare("SELECT * FROM characteristics;");
        $statement->execute();

        while ($result = $statement->fetch()) {
            $dto = $this->getDTOCharacteristics($result);
            $list[] = $dto;
        }

        return $list;
    }

    /**
     * @param int $productId
     * @return list<DTOCharacteristics>
     */
    public function findByProduct(int $productId) : array {
        $list = [];
        $statement = $this->provider->getConnection()->prepare("SELECT * FROM characteristics WHERE id_product = :id_product;");
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
