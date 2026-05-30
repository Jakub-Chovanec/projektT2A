<?php
declare(strict_types=1);

require __DIR__ . '/src/bootstrap.php';
require_once __DIR__ . '/src/Repository/ShippingMethodRepository.php';
require_once __DIR__ . '/src/Repository/PaymentMethodRepository.php';
require_once __DIR__ . '/src/Validator.php';

if ($cart->isEmpty() || !isset($_SESSION['checkout_data'])) {
    header('Location: kosik.php');
    exit;
}

$shippingRepo = new ShippingMethodRepository($pdo);
$paymentRepo = new PaymentMethodRepository($pdo);

$shippings = $shippingRepo->getAll();
$payments = $paymentRepo->getAll();

$errors = [];
$shippingId = (int)($_SESSION['shipping_id'] ?? 0);
$paymentId = (int)($_SESSION['payment_id'] ?? 0);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $shippingId = (int)($_POST['shipping_id'] ?? 0);
    $paymentId = (int)($_POST['payment_id'] ?? 0);

    $v = new Validator();
    $v->required('shipping_id', $shippingId ?: '', 'Musíte vybrat způsob dopravy.')
      ->required('payment_id', $paymentId ?: '', 'Musíte vybrat způsob platby.');

    if ($v->isValid()) {
        $_SESSION['shipping_id'] = $shippingId;
        $_SESSION['payment_id'] = $paymentId;
        header('Location: objednavka-3.php');
        exit;
    }
    $errors = $v->getErrors();
}
?>

<?php require __DIR__ . '/partials/header.php'; ?>

<main class="main">
    <div class="checkout-steps">
        <div class="step">1. Dodací údaje</div>
        <div class="step active">2. Doprava a platba</div>
        <div class="step">3. Shrnutí</div>
    </div>

    <section class="form1">
        <form action="objednavka-2.php" method="POST" class="checkout-form">
            <div class="full-width">
                <h3>Doprava</h3>
                <div class="method-selection">
                    <?php foreach ($shippings as $s): ?>
                        <label class="method-item">
                            <input type="radio" name="shipping_id" value="<?= $s->id ?>" <?= $shippingId === $s->id ? 'checked' : '' ?>>
                            <div class="method-info">
                                <span><strong><?= htmlspecialchars($s->name) ?></strong> (<?= htmlspecialchars($s->deliveryTime) ?>)</span>
                                <span><?= $s->price ?> Kč</span>
                            </div>
                        </label>
                    <?php endforeach; ?>
                </div>
                <?php if (isset($errors['shipping_id'])): ?><span class="error-message"><?= $errors['shipping_id'] ?></span><?php endif; ?>
            </div>

            <div class="full-width">
                <br>
                <h3>Platba</h3>
                <div class="method-selection">
                    <?php foreach ($payments as $p): ?>
                        <label class="method-item">
                            <input type="radio" name="payment_id" value="<?= $p->id ?>" <?= $paymentId === $p->id ? 'checked' : '' ?>>
                            <div class="method-info">
                                <span><strong><?= htmlspecialchars($p->name) ?></strong></span>
                                <span><?= $p->price ?> Kč</span>
                            </div>
                        </label>
                    <?php endforeach; ?>
                </div>
                <?php if (isset($errors['payment_id'])): ?><span class="error-message"><?= $errors['payment_id'] ?></span><?php endif; ?>
            </div>

            <div class="checkout-actions">
                <a href="objednavka-1.php" class="back">← Zpět k údajům</a>
                <button type="submit" class="btn-next">Pokračovat k shrnutí</button>
            </div>
        </form>
    </section>
</main>

<?php require __DIR__ . '/partials/footer.php'; ?>