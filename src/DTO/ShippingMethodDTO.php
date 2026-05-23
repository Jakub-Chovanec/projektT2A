<?php
declare(strict_types=1);

class ShippingMethodDTO {
    public function __construct(
        public int $id,
        public string $name,
        public int $price,
        public string $deliveryTime
    ) {}
}