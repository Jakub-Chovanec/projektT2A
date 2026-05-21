<?php
declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/src/bootstrap.php';
require_once __DIR__ . '/src/repository/ProductRepository.php';
require_once __DIR__ . '/src/repository/CategoryRepository.php';

// Vytvoříme si pomocníka pro produkty a řekneme mu, ať nám dá všechny produkty
$productRepository = new ProductRepository($pdo);
$products = $productRepository->getFeatured(4); // Načte jen 4 produkty pro úvodní stranu

$categoryRepository = new CategoryRepository($pdo);
$categories = $categoryRepository->getAll();
?>

<?php require __DIR__ . '/partials/header.php'; ?>

    
    <main class="main">

    <section class="recommended-products">
        <h2>Doporučené produkty</h2>

        <div class="products-r">

        <?php foreach ($products as $product): ?>
            <article class="product-r">
                <!-- Odkaz zatím směřujeme na produkt.php, který vytvoříme později -->
                <a href="produkt.php?id=<?= htmlspecialchars((string)$product->id) ?>" class="recommended-text">
                    <img class="recommended-img" src="<?= htmlspecialchars($product->image) ?>" alt="<?= htmlspecialchars($product->name) ?>">
                    <?= htmlspecialchars($product->name) ?>
                </a>
            </article>
        <?php endforeach; ?>

        </div>
    </section>
    
    <section class="category-products">
        <h2 class="main-category-title">Vyberte si kategorii</h2>
        <div class="products-k">
            <?php foreach ($categories as $cat): ?>
                <article class="product-k">
                    <a href="kategorie.php?slug=<?= htmlspecialchars($cat->slug) ?>" class="category-odkaz">
                        <h3 class="category-text"><?= htmlspecialchars($cat->name) ?></h3>
                    </a>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    </main>

    <?php require __DIR__ . '/partials/footer.php'; ?>
        
    
