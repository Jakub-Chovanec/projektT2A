<?php
declare(strict_types=1);

require __DIR__ . '/src/bootstrap.php';
?>

<?php require __DIR__ . '/partials/header.php'; ?>

<main class="main">

    <section class="product-detail">

        <div class="product-images">
            <img src="Assets/images/Sony 18-105 mm f/detail 1.webp" alt="Sony 18-105 mm f/4.0 G SEL">
        </div>


        <div class="product-info">
            <h2>Sony 18-105 mm f/4.0 G SEL</h2>

        <section class="product-description">
            <h3>Popis produktu</h3>
            <p>
                Sony 18-105 mm f/4.0 G SEL je kvalitní objektiv,
                který si rozumí především s fotoaparáty s APS-C snímači.
                Dokonale pasuje na bajonet E. Se svou minimální vzdáleností
                pro zaostření 45 cm (širokoúhlý), respektive 95 cm (teleobjektiv)
                a 0,11× poměrem zvětšení se bude hodit i pro pořizování snímků na velké vzdálenosti. 
            </p>
        </section>
        <br>
        <br>

            <ul class="product-specs">
                <li>Bajonet Sony E</li>
                <li>Typ objektivu Zoom</li>
                <li>Min. ohnisková vzdálenost 18 mm</li>
                <li>Max. ohnisková vzdálenost 105 mm</li>
            </ul>
            <br>
            <br>

            <p class="product-price">15 990,-</p>


            <a href="košík-krok-1.php" class="cart">
                Přidat do košíku
            </a>
        </div>

    </section>

    <section class="product-gallery">

    <div class="gallery-grid">
        <img src="Assets/images/Sony 18-105 mm f/detail 2.webp" alt="Sony 18-105 mm f/4.0 G SEL – detail 1">
             
        <img src="Assets/images/Sony 18-105 mm f/detail 3.webp" alt="Sony 18-105 mm f/4.0 G SEL – detail 2">

        <img src="Assets/images/Sony 18-105 mm f/detail 4.webp" alt="Sony 18-105 mm f/4.0 G SEL – detail 3">
    </div>
</section>


</main>

<?php require __DIR__ . '/partials/footer.php'; ?>