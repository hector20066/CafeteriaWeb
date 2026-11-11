<?php

require_once __DIR__ . '/../builder/dto/DTOProductUpdateBuilder.php';

class DTOProductsUpdate {

    private int $id;
    private string $name;
    private string $slug;
    private int $categoryId;
    private string $price;
    private string $image;
    private string $description;
    private string $briefDescription;

    public function __construct(DTOProductUpdateBuilder $builder) {
        $this->id = $builder->getId();
        $this->name = $builder->getName();
        $this->slug = $builder->getSlug();
        $this->categoryId = $builder->getCategoryId();
        $this->price = $builder->getPrice();
        $this->image = $builder->getImage();
        $this->description = $builder->getDescription();
        $this->briefDescription = $builder->getBriefDescription();
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

    public function getCategoryId() : int {
        return $this->categoryId;
    }

    public function getPrice() : string {
        return $this->price;
    }

    public function getImage() : string {
        return $this->image;
    }

    public function getDescription() : string {
        return $this->description;
    }

    public function getBriefDescription() : string {
        return $this->briefDescription;
    }

}