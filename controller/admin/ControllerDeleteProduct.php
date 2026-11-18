<?php

require_once __DIR__ . '/../../database/DataBase.php';
require_once __DIR__ . '/../../database/ConnectionProviderImpl.php';
require_once __DIR__ . '/../../model/dao/impl/DAOProductsImpl.php';
require_once __DIR__ . '/../../model/dao/impl/DAOCharacteristicsImpl.php';
require_once __DIR__ . '/../../service/impl/ProductsServiceImpl.php';
require_once __DIR__ . '/../../service/impl/CharacteristicsServiceImpl.php';

$dataBase = DataBase::getInstance();
$connectionProvider = new ConnectionProviderImpl($dataBase);

$daoProducts = new DAOProductsImpl($connectionProvider);
$daoCharacteristics = new DAOCharacteristicsImpl($connectionProvider);

$characteristicsService = new CharacteristicsServiceImpl($daoCharacteristics);
$productService = new ProductsServiceImpl($daoProducts, $characteristicsService, $connectionProvider);

$msg = "";
$typeValidation = "";

try {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $productId = $_GET['product_id'];

        if ($productId === null || $productId === 0) {
            throw new InvalidArgumentException('Por favor seleccione un producto válido.');
        }

        $found = !($productService->findById($productId) === null);

        if ($found) {
            $productService->delete($productId);
            $message = "Se ha eliminado el producto correctamente";

            header("Location: ../../view/admin/products.php?" . http_build_query(['msg' => $message, 'type' => "success"]));
            exit();
        } else {
            throw new InvalidArgumentException("No se ha encontrado este producto. Verifique la información");
        }
    }
} catch (InvalidArgumentException $e) {
    $msg = $e->getMessage();
    $typeValidation = "warning";
} catch (Throwable $e) {
    $msg = "Ha ocurrido un error al eliminar el producto.\nError: " . $e->getMessage();
    $typeValidation = "error";
}

header("Location: ../../view/admin/products.php?" . http_build_query(['msg' => $msg, 'type' => $typeValidation]));
exit();
