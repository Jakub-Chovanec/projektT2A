<?php
declare(strict_types=1);

require __DIR__ . '/src/bootstrap.php';
require_once __DIR__ . '/src/repository/ProductRepository.php';

// Získání ID produktu z URL parametru
$productId = (int)($_GET['id'] ?? 0);

// Pokud ID není platné (např. 0 nebo není v URL), přesměrujeme na 404
if ($productId === 0) {
    header('Location: 404.php'); // Předpokládáme, že 404.php existuje
    exit();
}

// Načtení produktu z databáze
$productRepository = new ProductRepository($pdo);
$product = $productRepository->getById($productId);

// Pokud produkt nebyl nalezen, přesměrujeme na 404
if ($product === null) {
    header('Location: 404.php'); // Předpokládáme, že 404.php existuje
    exit();
}

// Zde by se načítaly další detaily jako popis, specifikace, galerie obrázků
// Pro zjednodušení teď použijeme jen základní data z ProductDTO
// V budoucnu by ProductDTO mohl být rozšířen o další vlastnosti, nebo by se zde volaly další repozitáře

?>

<?php require __DIR__ . '/partials/header.php'; ?>

<main class="main">

    <section class="product-detail">

        <div class="product-images">
            <img src="<?= htmlspecialchars($product->image) ?>" alt="<?= htmlspecialchars($product->name) ?>">
        </div>

        <div class="product-info"> <!-- Opraveno ze section na div -->
            <h2><?= htmlspecialchars($product->name) ?></h2>

            <section class="product-description">
                <h3>Popis produktu</h3>
                <p><?= htmlspecialchars($product->description) ?></p>
            </section>
            <br>
            <br>

            <ul class="product-specs">
                <?php 
                // Pokud máme specifikace oddělené středníkem, vypíšeme je jako seznam
                if (!empty($product->specs)) {
                    $specs = explode(';', $product->specs);
                    foreach ($specs as $spec) {
                        echo "<li>" . htmlspecialchars(trim($spec)) . "</li>";
                    }
                }
                ?>
            </ul>
            <br>
            <br>

            <p class="product-price"><?= htmlspecialchars(number_format($product->price, 0, ',', ' ')) ?>,- Kč</p>

            <a href="košík-krok-1.php?add=<?= $product->id ?>" class="cart">
                Přidat do košíku
            </a>
        </div>

    </section>

    <?php if (!empty($product->gallery)): ?>
    <section class="product-gallery">
        <div class="gallery-grid">
            <?php 
            $galleryImages = explode(';', $product->gallery);
            foreach ($galleryImages as $index => $imageUrl): 
            ?>
                <img src="<?= htmlspecialchars(trim($imageUrl)) ?>" alt="<?= htmlspecialchars($product->name) ?> – detail <?= $index + 1 ?>">
            <?php endforeach; ?>
        </div>
    </section>
    <?php endif; ?>

</main>

<?php require __DIR__ . '/partials/footer.php'; ?>