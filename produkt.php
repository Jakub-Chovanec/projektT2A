<?php
declare(strict_types=1);

require __DIR__ . '/src/bootstrap.php';
require_once __DIR__ . '/src/repository/ProductRepository.php';

// Získání slug produktu z URL parametru
$slug = $_GET['slug'] ?? '';

// Pokud slug chybí, přesměrujeme na 404
if (empty($slug)) {
    header('Location: 404.php'); // Předpokládáme, že 404.php existuje
    exit();
}

// Načtení produktu z databáze
$productRepository = new ProductRepository($pdo);
$product = $productRepository->getBySlug($slug);

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

            <div class="product-variants" style="margin-bottom: 20px;">
                <label for="variant" style="display: block; margin-bottom: 8px; font-weight: bold;">Vyberte variantu:</label>
                <select name="variant" id="variant" style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 4px; font-family: inherit; cursor: pointer;">
                    <option value="basic">Základní balení</option>
                    <option value="premium">Premium set s brašnou (+ 2 000 Kč)</option>
                </select>
            </div>

            <p class="product-price"><?= htmlspecialchars(number_format($product->price, 0, ',', ' ')) ?>,- Kč</p>

            <form action="kosik.php" method="POST" class="add-to-cart-form">
                <input type="hidden" name="action" value="add">
                <input type="hidden" name="product_id" value="<?= $product->id ?>">
                <script>
                    // Synchronizace varianty do skrytého pole formuláře při změně selectu
                    document.addEventListener('DOMContentLoaded', () => {
                        const sel = document.getElementById('variant');
                        const form = document.querySelector('.add-to-cart-form');
                        const input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = 'variant';
                        input.value = sel.value;
                        form.appendChild(input);
                        sel.addEventListener('change', () => { input.value = sel.value; });
                    });
                </script>
                <button type="submit" class="cart">Přidat do košíku</button>
            </form>
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