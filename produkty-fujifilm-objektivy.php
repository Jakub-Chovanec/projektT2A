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
                    <a href="produkt.php?id=16" class="product-odkaz"> <!-- Předpokládám ID 16 pro Fujifilm Fujinon XF 16-50mm, pokud ho přidáš do DB -->

                        <img class="product-img" src="Assets/images/fujifilm fujinon XF.webp" alt="fujifilm fujinon-product">
                        <h4 class="procuct-name">Fujifilm Fujinon XF 16-50mm f/2.8-4.8 R LM WR</h4>
                    </a>
                    <p class="product-price">19 890,-</p>
                </article>

                <article class="product">
                    <a href="produkt.php?id=17" class="product-odkaz"> <!-- Předpokládám ID 17 pro Fujifilm Fujinon XF 50mm, pokud ho přidáš do DB -->

                        <img class="product-img" src="Assets/images/Funijon XF 50mm.webp" alt="Fujinon XF 50mm-product">
                        <h4 class="procuct-name">Fujifilm Fujinon XF 50mm f/2.0 R WR Black</h4>
                    </a>
                    <p class="product-price">12 990,-</p>
                </article>

                <article class="product">
                    <a href="produkt.php?id=18" class="product-odkaz"> <!-- Předpokládám ID 18 pro Fujifilm Fujinon XF 55-200mm, pokud ho přidáš do DB -->

                        <img class="product-img" src="Assets/images/Fujinon XF 55-200mm.webp" alt="Fujinon XF 55-200mm">
                        <h4 class="procuct-name">Fujifilm Fujinon XF 55-200mm F/3.5-4.8</h4>
                    </a>
                    <p class="product-price">19 990,-</p>
                </article>

            </div>

        </section>
    </main>

        <?php require __DIR__ . '/partials/footer.php'; ?>