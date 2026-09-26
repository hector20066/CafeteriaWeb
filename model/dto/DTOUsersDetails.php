<?php

class DTOUsersDetails {

    private int $id;
    private string $name;
    private string $email;
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

    public function getRole() : Roles {
        return $this->role;
    }

    public function setRole(Roles $role) : void {
        $this->role = $role;
    }

}
