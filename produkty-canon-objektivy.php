<?php
declare(strict_types=1);

require __DIR__ . '/src/bootstrap.php';
?>

<?php require __DIR__ . '/partials/header.php'; ?>

    <main class="main">

        <section class="products-overview">

            <img class="banner-sony-objektivy" src="Assets/images/canon-fotoaparaty.jpg" alt="">
            <h2>CANON OBJEKTIVY</h2>

            <div class="products">
                
                <article class="product">
                    <a href="Canon RF-S detail.html" class="product-odkaz">

                        <img class="product-img" src="Assets/images/Canon RF-S 18-150mm.webp" alt="Sony ZV-E10-product">
                        <h4 class="procuct-name">Canon RF-S 18-150mm f/3,5-6,3 IS STM</h4>
                    </a>
                    <p class="product-price">14 490,-</p>
                </article>

                <article class="product">
                    <a href="Canon EF 50mm detail.html" class="product-odkaz">

                        <img class="product-img" src="Assets/images/Canon EF 50mmwebp.webp" alt="Sony ZV-E10-product">
                        <h4 class="procuct-name">Canon EF 50mm f/1.8 STM</h4>
                    </a>
                    <p class="product-price">2 999,-</p>
                </article>

                <article class="product">
                    <a href="Canon RF 16 mm detail.html" class="product-odkaz">

                        <img class="product-img" src="Assets/images/Canon RF 16 mm.webp" alt="Sony ZV-E10-product">
                        <h4 class="procuct-name">Canon RF 16 mm F2.8 STM</h4>
                    </a>
                    <p class="product-price">8 690,-</p>
                </article>

            </div>

        </section>

       <?php require __DIR__ . '/partials/footer.php'; ?>