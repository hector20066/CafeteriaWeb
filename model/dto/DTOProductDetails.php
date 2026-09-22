<?php

    use Decimal\Decimal;

    class DTOProductDetails {

        private int $id;
        private string $name;
        private string $description;
        private Decimal $price;
        private string $category;
        private string $slug;
        private string $image;

        /** @var Characteristics[] */
        private array $characteristics = [];

        public function __construct(DTOProductDetailsBuilder $builder) {
            $this->id = $builder->getId();
            $this->name = $builder->getName();
            $this->description = $builder->getDescription();
            $this->price = $builder->getPrice();
            $this->category = $builder->getCategory();
            $this->slug = $builder->getSlug();
            $this->image = $builder->getImage();
            $this->characteristics = $builder->getCharacteristics();
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