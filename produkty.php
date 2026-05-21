<?php
declare(strict_types=1);

require __DIR__ . '/src/bootstrap.php';
require_once __DIR__ . '/src/repository/ProductRepository.php';
require_once __DIR__ . '/src/repository/CategoryRepository.php';

$categorySlug = $_GET['slug'] ?? '';
$brand = $_GET['brand'] ?? null;

$categoryRepo = new CategoryRepository($pdo);
$category = $categoryRepo->getBySlug($categorySlug);

if (!$category) {
    header('Location: 404.php');
    exit;
}

$productRepo = new ProductRepository($pdo);
$products = $productRepo->getByCategory($category->id, $brand);

// Dynamický nadpis podle toho, jestli filtrujeme i značku
$title = mb_strtoupper($category->name);
if ($brand) {
    $title = mb_strtoupper($brand) . ' ' . $title;
}
?>

<?php require __DIR__ . '/partials/header.php'; ?>
<main class="main">
    <section class="products-overview">
        <h2><?= htmlspecialchars($title) ?></h2>
        <div class="products">
            <?php if (empty($products)): ?>
                <p>V této kategorii momentálně nemáme žádné produkty.</p>
            <?php else: ?>
                <?php foreach ($products as $product): ?>
                    <?php require __DIR__ . '/partials/product-card.php'; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>
</main>
<?php require __DIR__ . '/partials/footer.php'; ?>