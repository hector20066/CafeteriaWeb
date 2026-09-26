<?php

use Decimal\Decimal;

class DTOProductCreate {

    private string $name;
    private string $slug;
    private int $categoryId;
    private Decimal $price;
    private string $image;
    private string $description;
    private string $briefDescription;
    private DateTime $creationDate;

    public function __construct(DTOProductCreateBuilder $builder) {
        $this->name = $builder->getName();
        $this->slug = $builder->getSlug();
        $this->categoryId = $builder->getCategoryId();
        $this->price = $builder->getPrice();
        $this->image = $builder->getImage();
        $this->description = $builder->getDescription();
        $this->briefDescription = $builder->getBriefDescription();
        $this->creationDate = $builder->getCreationDate();
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

    public function getPrice() : Decimal {
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

    public function getCreationDate() : DateTime {
        return $this->creationDate;
    }

}