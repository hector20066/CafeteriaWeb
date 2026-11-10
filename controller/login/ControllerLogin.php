<?php

require_once __DIR__ . '/../../database/DataBase.php';
require_once __DIR__ . '/../../database/ConnectionProviderImpl.php';
require_once __DIR__ . '/../../security/BCryptEncryption.php';
require_once __DIR__ . '/../../security/Login.php';
require_once __DIR__ . '/../../model/dao/impl/DAOUsersImpl.php';
require_once __DIR__ . '/../../service/impl/UsersServiceImpl.php';

$dataBase = DataBase::getInstance();
$connectionProvider = new ConnectionProviderImpl($dataBase);

$bcrypt = new BCryptEncryption();

$daoUsers = new DAOUsersImpl($connectionProvider);
$usersService = new UsersServiceImpl($daoUsers, $bcrypt);

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $plainPasswd = $_POST['passwd'];

        if (empty($email) || empty($plainPasswd)) {
            header("Location: ../../view/login/login.php");
            exit();
        }

        $accessLogin = new Login($usersService, $bcrypt);

        if ($accessLogin->login(trim($email), trim($plainPasswd))) {
            $message = "Inicio de sesión correcto. Bienvenido";
            header("Location: ../../view/admin/index.php?" . http_build_query(['msg' => $message, 'type' => 'success']));
        } else {
            $message = "No se han encontrado estas credenciales de acceso";
            header("Location: ../../view/login/login.php?" . http_build_query(['msg' => $message, 'type' => 'warning']));
        }

        exit();
    }
} catch (Throwable $e) {
    $message = "Ha ocurrido un error al iniciar sesión";
    header("Location: ../../view/login/login.php?" . http_build_query(['msg' => $message, 'type' => 'error']));
    exit();
}
