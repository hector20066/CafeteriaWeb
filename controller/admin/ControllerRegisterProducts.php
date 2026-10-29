<?php

require_once __DIR__ . '/../../database/DataBase.php';
require_once __DIR__ . '/../../database/ConnectionProviderImpl.php';
require_once __DIR__ . '/../../model/dao/impl/DAOProductsImpl.php';
require_once __DIR__ . '/../../model/dao/impl/DAOCharacteristicsImpl.php';
require_once __DIR__ . '/../../service/impl/ProductsServiceImpl.php';

$dataBase = DataBase::getInstance();
$connectionProvider = new ConnectionProviderImpl($dataBase);

$daoProduct = new DAOProductsImpl($connectionProvider);
$daoCharacteristics = new DAOCharacteristicsImpl($connectionProvider);

$characteristicService = new CharacteristicsServiceImpl($daoCharacteristics);
$productService = new ProductsServiceImpl($daoProduct, $characteristicService, $connectionProvider);

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['product_name'];
        $slug = $_POST['slug'];
        $categoryId = $_POST['category'];
        $price = $_POST['price'];
        $briefDescription = $_POST['brief_description'];
        $description = $_POST['description'];

        $text = $_POST['characteristics'];
        $text = str_replace("\r\r", "\n", $text);
        $lines = explode("\n", $text);
        $characteristics = array_filter(array_map('trim', $lines));

        if (empty($name) || empty($slug) || empty($price) || empty($briefDescription) || empty($description)) {
            throw new RuntimeException('Por favor ingrese toda la información del producto.');
        }

        if ($categoryId === 0) {
            throw new RuntimeException('Por favor seleccione la categoría.');
        }

        if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
            throw new RuntimeException('No se pudo recibir la imagen');
        }

        $imageFile = $_FILES['image'];
        $maxSize = 5 * 1024 * 1024;

        if ($imageFile['size'] > $maxSize) {
            throw new RuntimeException('La imagen no puede superar los 5MB');
        }

        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mimeType = $finfo->file($imageFile['tmp_name']);

        $allowedTypes = [
            'image/jpeg' => 'jpg',
            'image/png' => 'png',
            'image/webp' => 'webp'
        ];

        if (!isset($allowedTypes[$mimeType])) {
            throw new RuntimeException('Formato no permitido. Usa JPG, PNG o WEBP');
        }

        $uploadDirectory = __DIR__ . '/../../img/products/';

        if (!is_dir($uploadDirectory)) {
            if (!mkdir($uploadDirectory, 0755, true)) {
                throw new RuntimeException('No se pudo crear la carpeta de imágenes');
            }
        }

        $fileName = bin2hex(random_bytes(16)) . '.' . $allowedTypes[$mimeType]; // Generate a random name
        $destination = $uploadDirectory . $fileName;

        if (!move_uploaded_file($imageFile['tmp_name'], $destination)) {
            throw new RuntimeException('No se pudo guardar la imagen en el servidor');
        }

        $imagePath = 'img/products/' . $fileName;

        $productService->add($name, $slug, $categoryId, $price, $imagePath, $destination, $briefDescription, $characteristics);

        $message = "Se ha registrado el producto";
        header("Location: ../../view/admin/productos.php?msg=" . $message . "&type=success");
    }
} catch (Exception $e) {
    $message = "Ha ocurrido un error al registrar el producto.\nError: " . $e->getMessage();
    header("Location: ../../view/admin/productos.php?msg=" . $message . "&type=error");
}