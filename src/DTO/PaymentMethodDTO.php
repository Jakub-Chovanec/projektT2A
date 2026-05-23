<?php
declare(strict_types=1);

class PaymentMethodDTO {
    public function __construct(
        public int $id,
        public string $name,
        public int $price
    ) {}
}