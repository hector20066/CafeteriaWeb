<?php

    use Decimal\Decimal;

    class DTOProductMenuBuilder {

        private int $id;
        private string $name;
        private string $slug;
        private string $briefDescription;
        private Decimal $price;
        private string $category;
        private string $image;

        public function id(int $id) : self {
            $this->id = $id;
            return $this;
        }

        public function name(string $name) : self {
            $this->name = $name;
            return $this;
        }

        public function slug(string $slug) : self {
            $this->slug = $slug;
            return $this;
        }

        public function briefDescription(string $briefDescription) : self {
            $this->briefDescription = $briefDescription;
            return $this;
        }

        public function price(Decimal $price) : self {
            $this->price = $price;
            return $this;
        }

        public function category(string $category) : self {
            $this->category = $category;
            return $this;
        }

        public function image(string $image) : self {
            $this->image = $image;
            return $this;
        }

        public function build() : DTOProductMenu {
            return new DTOProductMenu($this);
        }

        public function getId() : int {
            return $this->id;
        }

        public function getName() : string {
            return $this->name;
        }

        public function getSlug() : string {
            return $this->slug;
        }

        public function getBriefDescription() : string {
            return $this->briefDescription;
        }

        public function getPrice() : Decimal {
            return $this->price;
        }

        public function getCategory() : string {
            return $this->category;
        }

        public function getImage() : string {
            return $this->image;
        }

    }

?>