<?php
declare(strict_types=1);

class ProductDTO {
    
    public ?int $category_id = null;

    
    public function __construct(
        public int $id = 0,
        public string $slug = '',
        public string $name = '',
        public int $price = 0,
        public string $image = '',
        public string $description = '',
        public string $specs = '',
        public string $gallery = ''
    ) {}
}