<?php

require_once __DIR__ . '/../service/interfaces/UsersService.php';
require_once __DIR__ . '/BCryptEncryption.php';

class Login {

    private UsersService $usersService;
    private BCryptEncryption $encryption;

    public function __construct(UsersService $usersService, BCryptEncryption $encryption) {
        $this->usersService = $usersService;
        $this->encryption = $encryption;
    }

    /**
     * @param string $email
     * @param string $plainPasswd
     * @return bool
     * @throws Exception
     */
    public function login(string $email, string $plainPasswd) : bool {
        $userDto = $this->usersService->findByLogin($email);

        if ($userDto === null) {
            return false;
        }

        $hashedPasswd = $userDto->getPasswd();

        return $this->encryption->verifyPassword($plainPasswd, $hashedPasswd);
    }

}
