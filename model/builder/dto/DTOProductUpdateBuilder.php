<?php

require_once __DIR__ . '/../../dto/DTOProductsUpdate.php';

class DTOProductUpdateBuilder {

    private int $id;
    private string $name;
    private string $slug;
    private int $categoryId;
    private string $price;
    private string $image;
    private string $description;
    private string $briefDescription;

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

    public function categoryId(int $categoryId) : self {
        $this->categoryId = $categoryId;
        return $this;
    }

    public function price(string $price) : self {
        $this->price = $price;
        return $this;
    }

    public function image(string $image) : self {
        $this->image = $image;
        return $this;
    }

    public function description(string $description) : self {
        $this->description = $description;
        return $this;
    }

    public function briefDescription(string $briefDescription) : self {
        $this->briefDescription = $briefDescription;
        return $this;
    }

    public function build() : DTOProductsUpdate {
        return new DTOProductsUpdate($this);
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