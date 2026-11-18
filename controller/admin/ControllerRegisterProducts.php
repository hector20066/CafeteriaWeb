<?php

require_once __DIR__ . '/../../database/DataBase.php';
require_once __DIR__ . '/../../database/ConnectionProviderImpl.php';
require_once __DIR__ . '/../../model/dao/impl/DAOProductsImpl.php';
require_once __DIR__ . '/../../model/dao/impl/DAOCharacteristicsImpl.php';
require_once __DIR__ . '/../../service/impl/ProductsServiceImpl.php';
require_once __DIR__ . '/../../service/impl/CharacteristicsServiceImpl.php';

$dataBase = DataBase::getInstance();
$connectionProvider = new ConnectionProviderImpl($dataBase);

$daoProduct = new DAOProductsImpl($connectionProvider);
$daoCharacteristics = new DAOCharacteristicsImpl($connectionProvider);

$characteristicService = new CharacteristicsServiceImpl($daoCharacteristics);
$productService = new ProductsServiceImpl($daoProduct, $characteristicService, $connectionProvider);

$msg = "";
$typeValidation = "";

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $isEditMode = filter_var($_POST['is_edit_mode'] ?? false, FILTER_VALIDATE_BOOLEAN);

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
            throw new InvalidArgumentException('Por favor ingrese toda la información del producto.');
        }

        if ((int) $categoryId === 0) {
            throw new InvalidArgumentException('Por favor seleccione la categoría.');
        }

        $message = "";

        if ($isEditMode) {
            $productId = $_POST['product_id'];
            $productService->modify($name, $slug, $categoryId, $price, $description, $briefDescription, $productId, $characteristics);
            $message = "Se ha modificado el producto";
        } else {
            if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
                throw new InvalidArgumentException('No se pudo recibir la imagen');
            }

            $imageFile = $_FILES['image'];
            $maxSize = 5 * 1024 * 1024;

            if ($imageFile['size'] > $maxSize) {
                throw new InvalidArgumentException('La imagen no puede superar los 5MB');
            }

            $finfo = new finfo(FILEINFO_MIME_TYPE);
            $mimeType = $finfo->file($imageFile['tmp_name']);

            $allowedTypes = [
                'image/jpeg' => 'jpg',
                'image/png' => 'png',
                'image/webp' => 'webp'
            ];

            if (!isset($allowedTypes[$mimeType])) {
                throw new InvalidArgumentException('Formato no permitido. Usa JPG, PNG o WEBP');
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

            $productService->add($name, $slug, $categoryId, $price, $imagePath, $description, $briefDescription, $characteristics);
            $message = "Se ha registrado el producto";
        }

        header('Location: ../../view/admin/products.php?' . http_build_query(['msg' => $message, 'type' => 'success']));
        exit();
    }
} catch (InvalidArgumentException $e) {
    $msg = $e->getMessage();
    $typeValidation = "warning";
} catch (Throwable $e) {
    $msg = "Ha ocurrido un error al registrar el producto.\nError: " . $e->getMessage();
    $typeValidation = "error";
}

header('Location: ../../view/admin/products.php?' . http_build_query(['msg' => $msg, 'type' => $typeValidation]));
exit();
