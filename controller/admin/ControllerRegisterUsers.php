<?php

require_once __DIR__ . '/../../config/Paths.php';
require_once __DIR__ . '/../../database/DataBase.php';
require_once __DIR__ . '/../../database/ConnectionProviderImpl.php';
require_once __DIR__ . '/../../model/dao/impl/DAOUsersImpl.php';
require_once __DIR__ . '/../../service/impl/UsersServiceImpl.php';
require_once __DIR__ . '/../../security/BCryptEncryption.php';

$dataBase = DataBase::getInstance();
$connectionProvider = new ConnectionProviderImpl($dataBase);

$bcrypt = new BCryptEncryption();

$daoUsers = new DAOUsersImpl($connectionProvider);
$userService = new UsersServiceImpl($daoUsers, $bcrypt);

$msg = "";
$typeValidation = "";

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $isEditMode = filter_var($_POST['is_edit_mode'] ?? false, FILTER_VALIDATE_BOOLEAN);

        $name = $_POST['name'];
        $email = $_POST['email'];
        $role = $_POST['role'];

        $message = "";
        $type = "";

        if (empty($email) || empty($name) || empty($role)) {
            throw new InvalidArgumentException("Por favor ingrese todos los campos");
        }

        if ($isEditMode) {
            $idUser = $_POST['user_id'];

            $userService->modify($name, $email, Roles::from($role), $idUser);
            $message = "Se ha modificado el usuario";
        } else {
            $plainPassword = $_POST['password'];

            if (empty($plainPassword)) {
                throw new InvalidArgumentException("Por favor ingrese la contraseña");
            }

            $userService->add($name, $email, $plainPassword, Roles::from($role));
            $message = "Se ha registrado el usuario.";
        }

        header('Location: ' . url('view/admin/users.php?' . http_build_query(['msg' => $message, 'type' => 'success'])));
        exit();
    }
} catch (InvalidArgumentException $e) {
    $msg = $e->getMessage();
    $typeValidation = "warning";
} catch (Throwable $e) {
    $msg = "Ha ocurrido un error al registrar el usuario.\nError: " . $e->getMessage();
    $typeValidation = "error";
}

header('Location: ' . url('view/admin/users.php?' . http_build_query(['msg' => $msg, 'type' => $typeValidation])));
exit();