<?php

use Decimal\Decimal;

class Product {

        private int $id;
        private Category $category;
        private string $name;
        private string $description;
        private Decimal $price;
        private string $image;

        public function __construct() {

        }

        public function setId(int $id) : void {
            $this->id = $id;
        }

        public function setCategory(Category $category) : void {
            $this->category = $category;
        }
        
        public function setName(string $name) : void {
            $this->name = $name;
        }

        public function setDescription(string $description) : void {
            $this->description = $description;
        }

        public function setPrice(Decimal $price) : void {
            $this->price = $price;
        }

        public function setImage(string $image) : void {
            $this->image = $image;
        }

        public function getId() : int {
            return $this->id;
        }

        public function getCategory() : Category {
            return $this->category;
        }

        public function getName() : string {
            return $this->name;
        }

        public function getDescription() : string {
            return $this->description;
        }

        public function getPrice() : Decimal {
            return $this->price;
        }

        public function getImage() : string {
            return $this->image;
        }

    }

?>