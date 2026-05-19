<?php
declare(strict_types=1);

class ProductDTO {
    // Toto je "konstruktor" - speciální funkce, která se spustí, když vytvoříš nový produkt.
    // Tím, že před proměnné napíšeme "public", říkáme PHP, že to jsou ty vlastnosti (kolonky).
    public function __construct(
        public int $id,
        public string $name,
        public int $price,
        public string $image,
        public string $description,
        public string $specs,
        public string $gallery
    ) {}
}