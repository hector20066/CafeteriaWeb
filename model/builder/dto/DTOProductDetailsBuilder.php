<?php

    use Decimal\Decimal;

    class DTOProductDetailsBuilder {

        private int $id;
        private string $name;
        private string $description;
        private Decimal $price;
        private string $category;
        private string $slug;
        private string $image;

        /** @var Characteristics[] */
        private array $characteristics = [];

        public function id(int $id) : self {
            $this->id = $id;
            return $this;
        }

        public function name(string $name) : self {
            $this->name = $name;
            return $this;
        }

        public function description(string $description) : self {
            $this->description = $description;
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

        public function slug(string $slug) : self {
            $this->slug = $slug;
            return $this;
        }

        public function image(string $image) : self {
            $this->image = $image;
            return $this;
        }

        public function characteristics(array $characteristics) : self {
            $this->characteristics = $characteristics;
            return $this;
        }

        public function build() : DTOProductDetails {
            return new DTOProductDetails($this);
        }

        public function getId(): int {
            return $this->id;
        }

        public function getName(): string {
            return $this->name;
        }

        public function getDescription(): string {
            return $this->description;
        }

        public function getPrice(): Decimal {
            return $this->price;
        }

        public function getCategory(): string {
            return $this->category;
        }

        public function getSlug(): string {
            return $this->slug;
        }

        public function getImage(): string {
            return $this->image;
        }

        public function getCharacteristics(): array {
            return $this->characteristics;
        }

    }

?>