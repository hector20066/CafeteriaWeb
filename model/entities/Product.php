<?php

    use Decimal\Decimal;

    class Product {

        private int $id;
        private Category $category;
        private string $slug;
        private string $name;
        private string $description;
        private string $brief_description;

        /** @var Characteristics[] */
        private array $characteristics = [];

        private Decimal $price;
        private string $image;
        private DateTime $date;

        public function __construct() {

        }

        public function getId() : int {
            return $this->id;
        }

        public function setId(int $id) : void {
            $this->id = $id;
        }

        public function getCategory() : Category {
            return $this->category;
        }

        public function setCategory(Category $category) : void {
            $this->category = $category;
        }

        public function getSlug() : string {
            return $this->slug;
        }

        public function setSlug(string $slug) : void {
            $this->slug = $slug;
        }

        public function getName() : string {
            return $this->name;
        }

        public function setName(string $name) : void {
            $this->name = $name;
        }

        public function getDescription() : string {
            return $this->description;
        }

        public function setDescription(string $description) : void {
            $this->description = $description;
        }

        public function getBriefDescription() : string {
            return $this->brief_description;
        }

        public function setBriefDescription(string $brief_description) : void {
            $this->brief_description = $brief_description;
        }

        public function getCharacteristics() : array {
            return $this->characteristics;
        }

        public function setCharacteristics(array $characteristics) : void {
            $this->characteristics = $characteristics;
        }

        public function getPrice() : Decimal {
            return $this->price;
        }

        public function setPrice(Decimal $price) : void {
            $this->price = $price;
        }

        public function getImage() : string {
            return $this->image;
        }

        public function setImage(string $image) : void {
            $this->image = $image;
        }

        public function getDate() : DateTime {
            return $this->date;
        }

        public function setDate(DateTime $date) : void {
            $this->date = $date;
        }

    }

?>