<?php

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

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $isEditMode = $_POST['is_edit_mode'] ?? false;

        $name = $_POST['name'];
        $email = $_POST['email'];
        $role = $_POST['role'];

        $message = "";
        $type = "";

        if (empty($email) || empty($name) || empty($role)) {
            $message = "Por favor ingrese todos los campos";
            header("Location: ../../view/admin/users.php?" . http_build_query(['msg' => $message, 'type' => 'warning']));
            exit();
        }

        if ($isEditMode) {
            $idUser = $_POST['user_id'];

            $userService->modify($name, $email, Roles::from($role), $idUser);
            $message = "Se ha modificado el usuario";
        } else {
            $plainPassword = $_POST['password'];

            if (empty($plainPassword)) {
                $message = "Por favor ingrese la contraseña";
                header("Location: ../../view/admin/users.php?" . http_build_query(['msg' => $message, 'type' => 'warning']));
                exit();
            }

            $userService->add($name, $email, $plainPassword, Roles::from($role));
            $message = "Se ha registrado el usuario.";
        }

        header("Location: ../../view/admin/users.php?" . http_build_query(['msg' => $message, 'type' => 'success']));
        exit();
    }
} catch (Throwable $e) {
    $message = "Ha ocurrido un error al registrar el usuario";
    header("Location: ../../view/admin/users.php?" . http_build_query(['msg' => $message, 'type' => 'error']));
    exit();
}