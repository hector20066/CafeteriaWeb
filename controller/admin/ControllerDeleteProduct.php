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
$productService = new ProductsServiceImpl($daoProducts, $characteristicsService ,$connectionProvider);

try {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $productId = $_GET['product_id'];

        if ($productId === null || $productId === 0) {
            throw new RuntimeException('Por favor seleccione un producto válido.');
        }

        $found = !($productService->findById($productId) === null);
        $message = "";

        if ($found) {
            $productService->delete($productId);
            $message = "Se ha eliminado el producto correctamente";
        } else {
            $message = "No se ha encontrado este producto. Verifique la información";
        }

        header("Location: ../../view/admin/productos.php?msg=" . $message . "&type=success");
    }
} catch (Throwable $e) {
    $message = "Ha ocurrido un error al eliminar el producto.\nError: " . $e->getMessage();
    header("Location: ../../view/admin/productos.php?msg=" . $message . "&type=error");
}
