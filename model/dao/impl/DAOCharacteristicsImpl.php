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
     * @throws Exception
     */
    #[\Override]
    public function add(PDO $connection, DTOCharacteristics $dto) : void {
        try {
            $statement = $connection->prepare("INSERT INTO characteristics(id_product, feature) VALUES (:id_product, :feature);");

            $productId = $dto->getProductId();
            $feature = $dto->getFeature();

            $statement->bindParam(':id_product', $productId);
            $statement->bindParam(':feature', $feature);
            $statement->execute();
        } catch (Exception $e) {
            throw new Exception("Ha ocurrido un error al registrar la característica", 0, $e);
        }
    }

    /**
     * @param int $id
     * @return object | null
     * @throws Exception
     */
    #[\Override]
    public function findById(int $id) : ?DTOCharacteristics {
        try {
            $dto = null;
            $statement = $this->provider->getConnection()->prepare("SELECT * FROM characteristics WHERE id = :id;");
            $statement->bindParam(':id', $id);
            $statement->execute();

            if ($result = $statement->fetch()) {
                $dto = $this->getDTOCharacteristics($result);
            }

            return $dto;
        } catch (Exception $e) {
            throw new Exception("Ha ocurrido un error al buscar la característica por el id: " . $id, 0, $e);
        }
    }

    /**
     * @return list<DTOCharacteristics>
     * @throws Exception
     */
    #[\Override]
    public function findByAll() : array {
        try {
            $list = [];
            $statement = $this->provider->getConnection()->prepare("SELECT * FROM characteristics;");
            $statement->execute();

            while ($result = $statement->fetch()) {
                $dto = $this->getDTOCharacteristics($result);
                $list[] = $dto;
            }

            return $list;
        } catch (Exception $e) {
            throw new Exception("Ha ocurrido un error al listar las características", 0, $e);
        }
    }

    /**
     * @param int $productId
     * @return list<DTOCharacteristics>
     * @throws Exception
     */
    public function findByProduct(int $productId) : array {
        try {
            $list = [];
            $statement = $this->provider->getConnection()->prepare("SELECT * FROM characteristics WHERE id_product = :id_product;");
            $statement->bindParam(':id_product', $productId);
            $statement->execute();

            while ($result = $statement->fetch()) {
                $dto = $this->getDTOCharacteristics($result);
                $list[] = $dto;
            }

            return $list;
        } catch (Exception $e) {
            throw new Exception("Ha ocurrido un error al listas las características del producto con id: " . $productId, 0, $e);
        }
    }

    private function getDTOCharacteristics(mixed $result) : DTOCharacteristics {
        $dto = new DTOCharacteristics();
        $dto->setId((int) $result['id']);
        $dto->setProductId((int) $result['id_product']);
        $dto->setFeature((string) $result['feature']);

        return $dto;
    }

}
