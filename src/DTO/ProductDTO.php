<?php
declare(strict_types=1);

class ProductDTO {
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly int $price,
        public readonly string $image
    ) {}
}
