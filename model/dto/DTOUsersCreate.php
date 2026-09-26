<?php

class DTOUsersCreate {

    private string $name;
    private string $email;
    private string $passwd;
    private Roles $role;

    public function __construct() {

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
