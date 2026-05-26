<?php
declare(strict_types=1);

require __DIR__ . '/src/bootstrap.php';
require_once __DIR__ . '/src/repository/ProductRepository.php';
require_once __DIR__ . '/src/DTO/ShippingMethodRepository.php';
require_once __DIR__ . '/src/DTO/PaymentMethodRepository.php';
require_once __DIR__ . '/src/Validator.php';

// Kontrola, zda máme všechna potřebná data v session
if ($cart->isEmpty() || !isset($_SESSION['checkout_data']) || !isset($_SESSION['shipping_id']) || !isset($_SESSION['payment_id'])) {
    header('Location: kosik.php');
    exit;
}

$productRepo = new ProductRepository($pdo);
$shippingRepo = new ShippingMethodRepository($pdo);
$paymentRepo = new PaymentMethodRepository($pdo);

// Načtení dat ze session a DB
$userData = $_SESSION['checkout_data'];
$shipping = $shippingRepo->getById((int)$_SESSION['shipping_id']);
$payment = $paymentRepo->getById((int)$_SESSION['payment_id']);

// Výpočet cen
$cartItems = $cart->getItems();
$productsInOrder = [];
$subtotal = 0;

foreach ($cartItems as $key => $item) {
    $product = $productRepo->getById($item['id']);
    if ($product) {
        $pricePerUnit = $product->price;
        if ($item['variant'] === 'premium') {
            $pricePerUnit += 2000;
        }
        $subtotal += $pricePerUnit * $item['quantity'];
        $productsInOrder[] = ['product' => $product, 'quantity' => $item['quantity'], 'variant' => $item['variant'], 'price' => $pricePerUnit];
    }
}

$totalPrice = $subtotal + ($shipping?->price ?? 0) + ($payment?->price ?? 0);

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $v = new Validator();
    $v->required('terms', $_POST['terms'] ?? '', 'Musíte souhlasit s obchodními podmínkami.');

    if ($v->isValid()) {
        header('Location: objednavka-potvrzeni.php');
        exit;
    }
    $errors = $v->getErrors();
}
?>

<?php require __DIR__ . '/partials/header.php'; ?>

<main class="main">
    <div class="checkout-steps">
        <div class="step">1. Dodací údaje</div>
        <div class="step">2. Doprava a platba</div>
        <div class="step active">3. Shrnutí</div>
    </div>

    <section class="form1">
        <h2>Shrnutí objednávky</h2>

        <div class="summary-grid">
            <div class="summary-block">
                <h3>Dodací údaje</h3>
                <p><?= htmlspecialchars($userData['firstname'] . ' ' . $userData['lastname']) ?></p>
                <p><?= htmlspecialchars($userData['street']) ?></p>
                <p><?= htmlspecialchars($userData['zip'] . ' ' . $userData['city']) ?></p>
                <p><?= htmlspecialchars($userData['email']) ?></p>
                <p><?= htmlspecialchars($userData['phone']) ?></p>
            </div>

            <div class="summary-block">
                <h3>Doprava a platba</h3>
                <p><strong>Doprava:</strong> <?= htmlspecialchars($shipping?->name ?? '') ?> (<?= $shipping?->price ?? 0 ?> Kč)</p>
                <p><strong>Platba:</strong> <?= htmlspecialchars($payment?->name ?? '') ?> (<?= $payment?->price ?? 0 ?> Kč)</p>
                <?php if (!empty($userData['note'])): ?>
                    <p class="summary-note"><strong>Poznámka:</strong><br><?= nl2br(htmlspecialchars($userData['note'])) ?></p>
                <?php endif; ?>
            </div>
        </div>

        <div class="summary-block">
            <h3>Položky v košíku</h3>
            <?php foreach ($productsInOrder as $item): ?>
                <div class="cart-item">
                    <div class="cart-item-details">
                        <img src="<?= htmlspecialchars($item['product']->image) ?>" alt="" class="summary-item-img">
                        <span><?= htmlspecialchars($item['product']->name) ?> (<?= $item['quantity'] ?> ks) - 
                        <?= $item['variant'] === 'premium' ? 'Premium set' : 'Základ' ?></span>
                    </div>
                    <span class="cart-item-price"><?= number_format($item['price'] * $item['quantity'], 0, ',', ' ') ?> Kč</span>
                </div>
            <?php endforeach; ?>
            
            <div class="summary-total-block">
                <p>Mezisoučet: <?= number_format($subtotal, 0, ',', ' ') ?> Kč</p>
                <p>Doprava a platba: <?= number_format(($shipping?->price ?? 0) + ($payment?->price ?? 0), 0, ',', ' ') ?> Kč</p>
                <p class="total-price-large">Celkem: <?= number_format($totalPrice, 0, ',', ' ') ?> Kč</p>
            </div>
        </div>

        <form action="objednavka-3.php" method="POST" class="checkout-form-final">
            <label class="terms-label">
                <input type="checkbox" name="terms" value="1">
                Souhlasím s obchodními podmínkami *
            </label>
            <?php if (isset($errors['terms'])): ?>
                <span class="error-message"><?= $errors['terms'] ?></span>
            <?php endif; ?>

            <div class="checkout-actions">
                <a href="objednavka-2.php" class="back">← Zpět k dopravě</a>
                <button type="submit" class="btn-next">Odeslat objednávku</button>
            </div>
        </form>
    </section>
</main>

<?php require __DIR__ . '/partials/footer.php'; ?>