<?php

    use Decimal\Decimal;

    class DTOProductMenu {

        private int $id;
        private string $name;
        private string $slug;
        private string $briefDescription;
        private Decimal $price;
        private string $category;
        private string $image;

        public function __construct(DTOProductMenuBuilder $builder) {
            $this->id = $builder->getId();
            $this->name = $builder->getName();
            $this->slug = $builder->getSlug();
            $this->briefDescription = $builder->getBriefDescription();
            $this->price = $builder->getPrice();
            $this->category = $builder->getCategory();
            $this->image = $builder->getImage();
        }

        public function getId(): int {
            return $this->id;
        }

        public function getName(): string {
            return $this->name;
        }

        public function getSlug(): string {
            return $this->slug;
        }

        public function getBriefDescription(): string {
            return $this->briefDescription;
        }

        public function getPrice(): Decimal {
            return $this->price;
        }

        public function getCategory(): string {
            return $this->category;
        }

        public function getImage(): string {
            return $this->image;
        }

    }

?>
