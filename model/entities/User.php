<?php

    class User {

        private int $id;
        private string $name;
        private string $email;
        private string $user;
        private string $passwd;
        private Status $status;

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

        public function getStatus() : Status {
            return $this->status;
        }

        public function setStatus(Status $status) : void {
            $this->status = $status;
        }

    }

?>