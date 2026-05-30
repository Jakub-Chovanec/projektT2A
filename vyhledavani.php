<?php
declare(strict_types=1);

require __DIR__ . '/src/bootstrap.php';
require_once __DIR__ . '/src/Repository/ProductRepository.php';
require_once __DIR__ . '/src/DTO/ProductDTO.php';

$query = trim($_GET['q'] ?? '');
$productRepo = new ProductRepository($pdo);
$results = [];

if (mb_strlen($query) >= 3) {
    $stmt = $pdo->prepare("SELECT id, slug, name, price, image, description, specs, gallery 
                           FROM products WHERE name LIKE ? OR description LIKE ?");
    $stmt->execute(["%$query%", "%$query%"]);
    $results = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'ProductDTO');
}
?>

<?php require __DIR__ . '/partials/header.php'; ?>

<main class="main">
    <section class="products-overview">
        <h2>Výsledky vyhledávání pro: "<?= htmlspecialchars($query) ?>"</h2>
        
        <?php if ($query === ''): ?>
            <p>Zadejte prosím hledaný výraz.</p>
        <?php elseif (mb_strlen($query) < 3): ?>
            <p>Hledaný výraz musí mít alespoň 3 znaky.</p>
        <?php elseif (empty($results)): ?>
            <p>Pro váš dotaz nebyly nalezeny žádné produkty.</p>
        <?php else: ?>
            <div class="products">
                <?php foreach ($results as $product): ?>
                    <?php require __DIR__ . '/partials/product-card.php'; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </section>
</main>
<?php require __DIR__ . '/partials/footer.php'; ?>