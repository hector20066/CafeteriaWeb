<?php

    class Characteristics{

        private int $id;
        private string $feature;

        public function __construct() {

        }

        public function setId(int $id) : void {
            $this->id = $id;
        }

        public function setFeature(string $feature) : void {
            $this->feature = $feature;
        }

        public function getId() : int {
            return $this->id;
        }

        public function getFeature() : string {
            return $this->feature;
        }

    }

?>