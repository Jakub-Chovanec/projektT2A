<?php
declare(strict_types=1);

class Cart {
    public function __construct() {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        } else {
            // Migrace starých dat z košíku (převod z ID => množství na nové pole)
            foreach ($_SESSION['cart'] as $id => $item) {
                if (!is_array($item)) {
                    $quantity = (int)$item;
                    $productId = (int)$id;
                    unset($_SESSION['cart'][$id]);
                    $this->add($productId, $quantity, 'basic');
                }
            }
        }
    }

    public function add(int $productId, int $quantity = 1, string $variant = 'basic'): void {
        $key = $productId . '_' . $variant;
        if (isset($_SESSION['cart'][$key])) {
            $_SESSION['cart'][$key]['quantity'] += $quantity;
        } else {
            $_SESSION['cart'][$key] = [
                'id' => $productId,
                'quantity' => $quantity,
                'variant' => $variant
            ];
        }
    }

    public function remove(string $cartKey): void {
        unset($_SESSION['cart'][$cartKey]);
    }

    public function updateQuantity(string $cartKey, int $quantity): void {
        if ($quantity <= 0) {
            $this->remove($cartKey);
        } elseif (isset($_SESSION['cart'][$cartKey])) {
            $_SESSION['cart'][$cartKey]['quantity'] = $quantity;
        }
    }

    /**
     * Vrátí pole s obsahem košíku ve formátu [id => quantity]
     */
    public function getItems(): array {
        return $_SESSION['cart'];
    }

    public function getTotalCount(): int {
        $total = 0;
        foreach ($_SESSION['cart'] as $item) {
            $total += $item['quantity'];
        }
        return $total;
    }

    public function clear(): void {
        $_SESSION['cart'] = [];
    }

    public function isEmpty(): bool {
        return empty($_SESSION['cart']);
    }
}