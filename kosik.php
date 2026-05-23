<?php
declare(strict_types=1);

require __DIR__ . '/src/bootstrap.php';
require_once __DIR__ . '/src/repository/ProductRepository.php';

$productRepo = new ProductRepository($pdo);

// Zpracování akcí košíku (POST - princip Post/Redirect/Get)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $productId = (int)($_POST['product_id'] ?? 0);

    if ($action === 'add' && $productId > 0) {
        $cart->add($productId);
    } elseif ($action === 'remove' && $productId > 0) {
        $cart->remove($productId);
    } elseif ($action === 'update' && $productId > 0) {
        $quantity = (int)($_POST['quantity'] ?? 1);
        $cart->updateQuantity($productId, $quantity);
    }

    // Přesměrování zpět na košík (vypořádání se s PRG)
    header('Location: kosik.php');
    exit;
}

// Načtení dat produktů, které jsou v košíku
$cartItems = $cart->getItems();
$productsInCart = [];
$totalPrice = 0;

foreach ($cartItems as $id => $quantity) {
    $product = $productRepo->getById($id);
    if ($product) {
        $productsInCart[] = [
            'product' => $product,
            'quantity' => $quantity,
            'subtotal' => $product->price * $quantity
        ];
        $totalPrice += $product->price * $quantity;
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
                                <p><?= number_format($item['product']->price, 0, ',', ' ') ?> Kč / ks</p>
                            </div>
                        </div>

                        <div class="cart-item-controls">
                            <form action="kosik.php" method="POST">
                                <input type="hidden" name="action" value="update">
                                <input type="hidden" name="product_id" value="<?= $item['product']->id ?>">
                                <input type="number" name="quantity" value="<?= $item['quantity'] ?>" min="1" onchange="this.form.submit()" class="quantity-input">
                            </form>
                            
                            <p class="cart-item-price"><?= number_format($item['subtotal'], 0, ',', ' ') ?> Kč</p>

                            <form action="kosik.php" method="POST">
                                <input type="hidden" name="action" value="remove">
                                <input type="hidden" name="product_id" value="<?= $item['product']->id ?>">
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