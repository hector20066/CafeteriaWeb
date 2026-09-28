<?php

class DTOCharacteristics {

    private int $id;
    private int $productId;
    private string $feature;

    public function __construct() {

    }

    public function getId() : int {
        return $this->id;
    }

    public function setId(int $id) : void {
        $this->id = $id;
    }

    public function getProductId() : int {
        return $this->productId;
    }

    public function setProductId(int $productId) : void {
        $this->productId = $productId;
    }

    public function getFeature() : string {
        return $this->feature;
    }

    public function setFeature(string $feature) : void {
        $this->feature = $feature;
    }

}

