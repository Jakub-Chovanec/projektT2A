<?php
declare(strict_types=1);

require __DIR__ . '/src/bootstrap.php';
require_once __DIR__ . '/src/repository/ProductRepository.php';

$productRepo = new ProductRepository($pdo);

// Zpracování akcí košíku (POST - princip Post/Redirect/Get)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $productId = (int)($_POST['product_id'] ?? 0);
    $cartKey = $_POST['cart_key'] ?? '';
    $variant = $_POST['variant'] ?? 'basic';

    if ($action === 'add' && $productId > 0) {
        $cart->add($productId, 1, $variant);
    } elseif ($action === 'remove' && $cartKey !== '') {
        $cart->remove($cartKey);
    } elseif ($action === 'update' && $cartKey !== '') {
        $quantity = (int)($_POST['quantity'] ?? 1);
        $cart->updateQuantity($cartKey, $quantity);
    }

    // Přesměrování zpět na košík (vypořádání se s PRG)
    header('Location: kosik.php');
    exit;
}

// Načtení dat produktů, které jsou v košíku
$cartItems = $cart->getItems();
$productsInCart = [];
$totalPrice = 0;

foreach ($cartItems as $key => $item) {
    $product = $productRepo->getById($item['id']);
    if ($product) {
        $pricePerUnit = $product->price;
        if ($item['variant'] === 'premium') {
            $pricePerUnit += 2000;
        }
        $productsInCart[] = [
            'product' => $product,
            'quantity' => $item['quantity'],
            'variant' => $item['variant'],
            'cart_key' => $key,
            'price_per_unit' => $pricePerUnit,
            'subtotal' => $pricePerUnit * $item['quantity']
        ];
        $totalPrice += $pricePerUnit * $item['quantity'];
    }
}
?>

<?php require __DIR__ . '/partials/header.php'; ?>

<main class="main">
    <section class="cart-page">
        <h2>Váš nákupní košík</h2>

        <?php if ($cart->isEmpty()): ?>
            <div class="cart-empty">
                <p>Váš košík je zatím prázdný.</p>
                <br>
                <a href="index.php" class="btn-next">Pokračovat v nákupu</a>
            </div>
        <?php else: ?>
            <div class="cart-container"> <!-- Sem si dej svou třídu pro obal košíku -->
                <?php foreach ($productsInCart as $item): ?>
                    <div class="cart-item">
                        <!-- Použij své třídy z HTML fáze (např. .cart-img, .cart-name atd.) -->
                        <div class="cart-item-details">
                            <img src="<?= htmlspecialchars($item['product']->image) ?>" alt="">
                            <div>
                                <h3><?= htmlspecialchars($item['product']->name) ?></h3>
                                <p class="cart-item-variant"><?= $item['variant'] === 'premium' ? 'Premium set s brašnou (+ 2 000 Kč)' : 'Základní balení' ?></p>
                                <p><?= number_format($item['price_per_unit'], 0, ',', ' ') ?> Kč / ks</p>
                            </div>
                        </div>

                        <div class="cart-item-controls">
                            <form action="kosik.php" method="POST">
                                <input type="hidden" name="action" value="update">
                                <input type="hidden" name="cart_key" value="<?= $item['cart_key'] ?>">
                                <input type="number" name="quantity" value="<?= $item['quantity'] ?>" min="1" onchange="this.form.submit()" class="quantity-input">
                            </form>
                            
                            <p class="cart-item-price"><?= number_format($item['subtotal'], 0, ',', ' ') ?> Kč</p>

                            <form action="kosik.php" method="POST">
                                <input type="hidden" name="action" value="remove">
                                <input type="hidden" name="cart_key" value="<?= $item['cart_key'] ?>">
                                <button type="submit" class="remove-btn">✕</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="cart-summary">
                <strong>Celkem k úhradě: <?= number_format($totalPrice, 0, ',', ' ') ?> Kč</strong>
            </div>

            <div class="cart-actions">
                <a href="index.php" class="back">← Zpět k nakupování</a>
                <a href="objednavka-1.php" class="btn-next">Pokračovat k objednávce</a>
            </div>
        <?php endif; ?>
    </section>
</main>

<?php require __DIR__ . '/partials/footer.php'; ?>