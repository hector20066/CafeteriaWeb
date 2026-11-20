<?php

require_once __DIR__ . '/../../config/Paths.php';
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

$msg = "";
$typeValidation = "";

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $plainPasswd = $_POST['passwd'];

        if (empty($email) || empty($plainPasswd)) {
            throw new InvalidArgumentException("Por favor ingrese las credenciales de acceso.");
        }

        $accessLogin = new Login($usersService, $bcrypt);

        if ($accessLogin->login(trim($email), trim($plainPasswd))) {
            $message = "Inicio de sesión correcto. Bienvenido";
            header('Location: ' . url('view/admin/index.php?' . http_build_query(['msg' => $message, 'type' => 'success'])));
            exit();
        } else {
            throw new InvalidArgumentException("No se han encontrado estas credenciales de acceso");
        }
    }
} catch (InvalidArgumentException $e) {
    $msg = $e->getMessage();
    $typeValidation = "warning";
} catch (Throwable $e) {
    $msg = "Ha ocurrido un error al iniciar sesión";
    $typeValidation = "error";
}

header('Location: ' . url('view/login/login.php?' . http_build_query(['msg' => $msg, 'type' => $typeValidation])));
exit();
