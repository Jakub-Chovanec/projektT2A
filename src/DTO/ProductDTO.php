<?php
declare(strict_types=1);

class ProductDTO {
    // Definujeme category_id, aby PHP nevyhazovalo varování při mapování z DB
    public ?int $category_id = null;

    // Toto je "konstruktor" - speciální funkce, která se spustí, když vytvoříš nový produkt.
    // Přidali jsme výchozí hodnoty, aby PDO mohl vytvořit prázdný objekt a pak do něj vložit data.
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