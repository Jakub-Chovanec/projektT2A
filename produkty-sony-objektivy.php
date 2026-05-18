<?php
declare(strict_types=1);

require __DIR__ . '/src/bootstrap.php';
?>

<?php require __DIR__ . '/partials/header.php'; ?>

    <main class="main">

        <section class="products-overview">

            <img class="banner-sony-objektivy" src="Assets/images/objektivy-sony-banner.jpg" alt="banner">
            <h2>SONY OBJEKTIVY</h2>

            <div class="products">
                
                <article class="product">
                    <a href="Sony 18-105 mm detail.html" class="product-odkaz">

                        <img class="product-img" src="Assets/images/Sony 18-105 mm .webp" alt="Sony 18-105 mm-product">
                        <h4 class="procuct-name">Sony 18-105 mm f/4.0 G SEL</h4>
                    </a>
                    <p class="product-price">12 992,-</p>
                </article>

                <article class="product">
                    <a href="Sony FE 35mm detail.html" class="product-odkaz">

                        <img class="product-img" src="Assets/images/Sony FE 35 mm .webp" alt="Sony FE 35 mm-product">
                        <h4 class="procuct-name">Sony FE 35mm f/1.8</h4>
                    </a>
                    <p class="product-price">18 990,-</p>
                </article>

                <article class="product">
                    <a href="Samyang AF 14mm detail.html" class="product-odkaz">

                        <img class="product-img" src="Assets/images/Samyang AF 14 mm.webp" alt="Sony Samyang-product">
                        <h4 class="procuct-name">Samyang AF 14mm f/2.8 Sony FE</h4>
                    </a>
                    <p class="product-price">16 890,-</p>
                </article>

            </div>

        </section>

        <?php require __DIR__ . '/partials/footer.php'; ?>