<?php

require_once __DIR__ . '/../enums/Roles.php';

class User {

    private int $id;
    private string $name;
    private string $email;
    private string $user;
    private string $passwd;
    private Roles $role;

    public function __construct() {

    }

    public function getId() : int {
        return $this->id;
    }

    public function setId(int $id) : void {
        $this->id = $id;
    }

    public function getName() : string {
        return $this->name;
    }

    public function setName(string $name) : void {
        $this->name = $name;
    }

    public function getEmail() : string {
        return $this->email;
    }

    public function setEmail(string $email) : void {
        $this->email = $email;
    }

    public function getUser() : string {
        return $this->user;
    }

    public function setUser(string $user) : void {
        $this->user = $user;
    }

    public function getPasswd() : string {
        return $this->passwd;
    }

    public function setPasswd(string $passwd) : void {
        $this->passwd = $passwd;
    }

    public function getRole() : Roles {
        return $this->role;
    }

    public function setRole(Roles $role) : void {
        $this->role = $role;
    }

}
