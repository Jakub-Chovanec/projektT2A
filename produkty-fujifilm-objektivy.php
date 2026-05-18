<?php
declare(strict_types=1);

require __DIR__ . '/src/bootstrap.php';
?>

<?php require __DIR__ . '/partials/header.php'; ?>

    <main class="main">

        <section class="products-overview">

            <img class="banner-sony-objektivy" src="Assets/images/Fujifilm-banner.svg.png" alt="">
            <h2>FUJIFILM OBJEKTIVY</h2>

            <div class="products">
                
                <article class="product">
                    <a href="Fujifilm Fujinon XF 16-50mm detail.html" class="product-odkaz">

                        <img class="product-img" src="Assets/images/fujifilm fujinon XF.webp" alt="fujifilm fujinon-product">
                        <h4 class="procuct-name">Fujifilm Fujinon XF 16-50mm f/2.8-4.8 R LM WR</h4>
                    </a>
                    <p class="product-price">19 890,-</p>
                </article>

                <article class="product">
                    <a href="Fujifilm Fujinon XF 50mm detail.html" class="product-odkaz">

                        <img class="product-img" src="Assets/images/Funijon XF 50mm.webp" alt="Fujinon XF 50mm-product">
                        <h4 class="procuct-name">Fujifilm Fujinon XF 50mm f/2.0 R WR Black</h4>
                    </a>
                    <p class="product-price">12 990,-</p>
                </article>

                <article class="product">
                    <a href="Fujifilm Fujinon XF 55-200mm detail.html" class="product-odkaz">

                        <img class="product-img" src="Assets/images/Fujinon XF 55-200mm.webp" alt="Fujinon XF 55-200mm">
                        <h4 class="procuct-name">Fujifilm Fujinon XF 55-200mm F/3.5-4.8</h4>
                    </a>
                    <p class="product-price">19 990,-</p>
                </article>

            </div>

        </section>

        <?php require __DIR__ . '/partials/footer.php'; ?>