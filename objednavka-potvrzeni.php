<?php
declare(strict_types=1);

require __DIR__ . '/src/bootstrap.php';
require_once __DIR__ . '/src/repository/ProductRepository.php';
require_once __DIR__ . '/src/DTO/ShippingMethodRepository.php';
require_once __DIR__ . '/src/DTO/PaymentMethodRepository.php';

// Kontrola, zda máme data (aby někdo nepřišel na tuhle stránku přímo)
if (!isset($_SESSION['checkout_data']) || $cart->isEmpty()) {
    header('Location: index.php');
    exit;
}

$productRepo = new ProductRepository($pdo);
$shippingRepo = new ShippingMethodRepository($pdo);
$paymentRepo = new PaymentMethodRepository($pdo);

$userData = $_SESSION['checkout_data'];
$shipping = $shippingRepo->getById((int)$_SESSION['shipping_id']);
$payment = $paymentRepo->getById((int)$_SESSION['payment_id']);

try {
    // Spuštění transakce - vše se uloží najednou, nebo nic
    $pdo->beginTransaction();

    // 1. Uložení zákazníka
    $stmt = $pdo->prepare("INSERT INTO customers (firstname, lastname, email, phone, street, city, zip) 
                           VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([
        $userData['firstname'], $userData['lastname'], $userData['email'], 
        $userData['phone'], $userData['street'], $userData['city'], $userData['zip']
    ]);
    $customerId = (int)$pdo->lastInsertId();

    // 2. Výpočet celkové ceny pro objednávku
    $cartItems = $cart->getItems();
    $subtotal = 0;
    $itemsToSave = [];

    foreach ($cartItems as $key => $item) {
        $product = $productRepo->getById($item['id']);
        if ($product) {
            $pricePerUnit = $product->price;
            if ($item['variant'] === 'premium') {
                $pricePerUnit += 2000;
            }
            $subtotal += $pricePerUnit * $item['quantity'];
            $itemsToSave[] = ['id' => $item['id'], 'quantity' => $item['quantity'], 'price' => $pricePerUnit];
        }
    }

    $totalPrice = $subtotal + ($shipping?->price ?? 0) + ($payment?->price ?? 0);

    // 3. Uložení objednávky
    $stmt = $pdo->prepare("INSERT INTO orders (customer_id, shipping_method_id, payment_method_id, total_price, note) 
                           VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([
        $customerId, $_SESSION['shipping_id'], $_SESSION['payment_id'], $totalPrice, $userData['note']
    ]);
    $orderId = (int)$pdo->lastInsertId();

    // 4. Uložení položek objednávky
    $stmt = $pdo->prepare("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
    foreach ($itemsToSave as $item) {
        $stmt->execute([$orderId, $item['id'], $item['quantity'], $item['price']]);
    }

    // Potvrzení všech změn v DB
    $pdo->commit();

} catch (Exception $e) {
    // Pokud se cokoli nepovede, vrátíme změny zpět
    $pdo->rollBack();
    die("Chyba při ukládání objednávky: " . $e->getMessage());
}

// 5. Vyprázdnění košíku a smazání session dat
$cart->clear();
unset($_SESSION['checkout_data']);
unset($_SESSION['shipping_id']);
unset($_SESSION['payment_id']);
?>

<?php require __DIR__ . '/partials/header.php'; ?>

<main class="main centered-content">
    <section class="order-confirmation">
        <div class="success-icon">✓</div>
        <h1>Děkujeme za vaši objednávku!</h1>
        <p>Vaše objednávka byla úspěšně přijata a má číslo: <strong>#<?= $orderId ?></strong></p>
        <p>Potvrzení jsme odeslali na e-mail: <?= htmlspecialchars($userData['email']) ?></p>
        
        <div class="mt-2">
            <p>Brzy vás budeme informovat o dalším průběhu.</p>
            <br>
            <a href="index.php" class="btn-next">Zpět na úvodní stránku</a>
        </div>
    </section>
</main>

<?php require __DIR__ . '/partials/footer.php'; ?>