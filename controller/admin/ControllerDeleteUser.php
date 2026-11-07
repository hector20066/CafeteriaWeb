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

try {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $user_id = $_GET['user_id'];

        if ($user_id === null || $user_id === 0) {
            throw new RuntimeException("Por favor seleccione un usuario válido");
        }

        $found = !($userService->findById($user_id) === null);
        $message = "";
        $type = "";

        if ($found) {
            $userService->delete($user_id);
            $message = "Se ha eliminado el usuario correctamente";
            $type = "success";
        } else {
            $message = "No se ha encontrado el usuario con el id: " . $user_id;
            $type = "warning";
        }

        header("Location: ../../view/admin/users.php?msg=" . $message . "&type=" . $type);
    }
} catch (Throwable $e) {
    $message = "Ha ocurrido un error al eliminar el usuario.\nError: " . $e->getMessage();
    header("Location: ../../view/admin/users.php?msg=" . $message . "&type=error");
}
