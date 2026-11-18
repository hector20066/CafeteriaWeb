<?php

require_once __DIR__ . '/../../database/DataBase.php';
require_once __DIR__ . '/../../database/ConnectionProviderImpl.php';
require_once __DIR__ . '/../../model/dao/impl/DAOUsersImpl.php';
require_once __DIR__ . '/../../service/impl/UsersServiceImpl.php';
require_once __DIR__ . '/../../security/BCryptEncryption.php';

$dataBase = DataBase::getInstance();
$connectionProvider = new ConnectionProviderImpl($dataBase);
$BCrypt = new BCryptEncryption();

$daoUsers = new DAOUsersImpl($connectionProvider);
$userService = new UsersServiceImpl($daoUsers, $BCrypt);

$msg = "";
$typeValidation = "";

try {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $user_id = $_GET['user_id'];

        if ($user_id === null || $user_id === 0) {
            throw new InvalidArgumentException("Por favor seleccione un usuario válido");
        }

        $found = !($userService->findById($user_id) === null);

        if ($found) {
            $userService->delete($user_id);
            $message = "Se ha eliminado el usuario correctamente";

            header("Location: ../../view/admin/users.php?" . http_build_query(['msg' => $message, 'type' => "success"]));
            exit();
        } else {
            throw new InvalidArgumentException("No se ha encontrado el usuario con el id: " . $user_id);
        }
    }
} catch (InvalidArgumentException $e) {
    $msg = $e->getMessage();
    $typeValidation = "warning";
} catch (Throwable $e) {
    $msg = "Ha ocurrido un error al eliminar el usuario.\nError: " . $e->getMessage();
    $typeValidation = "error";
}

header("Location: ../../view/admin/users.php?" . http_build_query(['msg' => $msg, 'type' => $typeValidation]));
exit();
