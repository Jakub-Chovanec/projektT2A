<?php
declare(strict_types=1);

class Cart {
    public function __construct() {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    }

    public function add(int $productId, int $quantity = 1): void {
        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId] += $quantity;
        } else {
            $_SESSION['cart'][$productId] = $quantity;
        }
    }

    public function remove(int $productId): void {
        unset($_SESSION['cart'][$productId]);
    }

    public function updateQuantity(int $productId, int $quantity): void {
        if ($quantity <= 0) {
            $this->remove($productId);
        } else {
            $_SESSION['cart'][$productId] = $quantity;
        }
    }

    /**
     * Vrátí pole s obsahem košíku ve formátu [id => quantity]
     */
    public function getItems(): array {
        return $_SESSION['cart'];
    }

    public function getTotalCount(): int {
        return array_sum($_SESSION['cart']);
    }

    public function clear(): void {
        $_SESSION['cart'] = [];
    }

    public function isEmpty(): bool {
        return empty($_SESSION['cart']);
    }
}