<?php

require_once __DIR__ . '/../model/dao/interfaces/DAOUsers.php';
require_once __DIR__ . '/BCryptEncryption.php';

class Login {

    private DAOUsers $daoUsers;
    private BCryptEncryption $encryption;

    public function __construct(DAOUsers $daoUsers, BCryptEncryption $encryption) {
        $this->daoUsers = $daoUsers;
        $this->encryption = $encryption;
    }

    public function login(string $email, string $plainPasswd) : bool {
        $userDto = $this->daoUsers->findByLogin($email);

        if ($userDto === null) {
            return false;
        }

        $hashedPasswd = $userDto->getPasswd();

        return $this->encryption->verifyPassword($plainPasswd, $hashedPasswd);
    }

}
