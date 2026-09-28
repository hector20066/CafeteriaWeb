<?php

class BCryptEncryption {

    public function hashPassword(string $plainPassword) : string {
        return password_hash($plainPassword, PASSWORD_BCRYPT, ['cost' => 12]);
    }

    public function verifyPassword(string $plainPassword, string $hashedPassword) : bool {
        return password_verify($plainPassword, $hashedPassword);
    }

}
