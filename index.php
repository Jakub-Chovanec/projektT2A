<?php
declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/src/bootstrap.php';
require_once __DIR__ . '/src/repository/ProductRepository.php';

// Vytvoříme si pomocníka pro produkty a řekneme mu, ať nám dá všechny produkty
$productRepository = new ProductRepository($pdo);
$products = $productRepository->getFeatured(4); // Načte jen 4 produkty pro úvodní stranu
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

        <h2>Fotoaparáty</h2>

        <div class="products-k">

            <article class="product-k">
            <a href="produkty-sony-fotoaparaty.php" class="category-odkaz">
                <img class="category-img" src="Assets/images/sony_logo.png" alt="Sony-fotoaparaty Kategorie">
                <h3 class="category-text">Sony fotoaparáty</h3>
            </a>
        </article>

        <article class="product-k">
            <a href="produkty-canon-fotoaparaty.php" class="category-odkaz">
                <img class="category-img" src="Assets/images/Canon_logo.png" alt="Canon-fotoaparaty Kategorie">
                <h3 class="category-text">Canon Fotoaparáty</h3>
            </a>
        </article>

        <article class="product-k">
            <a href="produkty-fujifilm-fotoaparaty.php" class="category-odkaz">
                <img class="category-img" src="Assets/images/Fujifilm-logo.png" alt="FujiFilm-fotoaparaty Kategorie">
                <h3 class="category-text">FujiFilm Fotoaparáty</h3>
            </a>
        </article>
        </div>

        <h2>Objektivy</h2>

        <div class="products-k">
        <article class="product-k">
            <a href="produkty-sony-objektivy.php" class="category-odkaz">
                <img class="category-img" src="Assets/images/sony_logo.png" alt="Sony-objektivy Kategorie">
                <h3 class="category-text">Sony Objektity</h3>
            </a>
        </article>

        <article class="product-k">
            <a href="produkty-canon-objektivy.php" class="category-odkaz">
                <img class="category-img" src="Assets/images/Canon_logo.png" alt="Canon-objektivy Kategorie">
                <h3 class="category-text">Canon Objektivy</h3>
            </a>
        </article>

        <article class="product-k">
            <a href="produkty-fujifilm-objektivy.php" class="category-odkaz">
                <img class="category-img" src="Assets/images/Fujifilm-logo.png" alt="FujiFilm-objektivy Kategorie">
                <h3 class="category-text">FujiFilm Objektivy</h3>
            </a>
        </article>
        </div>
    </section>

    </main>

    <?php require __DIR__ . '/partials/footer.php'; ?>
        
    
