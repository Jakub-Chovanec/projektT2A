<?php
declare(strict_types=1);

require __DIR__ . '/src/bootstrap.php';
?>

<?php require __DIR__ . '/partials/header.php'; ?>

    <main class="main">

        <section class="products-overview">

            <img class="banner" src="Assets/images/Fujifilm-banner.svg.png" alt="Canon banner">
            
            <h2>FUJIFILM FOTOAPARÁTY</h2>

            <div class="products">
                
                <article class="product">
                    <a href="produkt.php?id=3" class="product-odkaz"> <!-- ID 3 je Fujifilm X100VI z init.php -->

                        <img class="product-img" src="Assets/images/FujiFilm X100VI Silver.webp" alt="Fujifilm X100VI-product">
                        <h4 class="procuct-name">Fujifilm X100VI Silver</h4>
                    </a>
                    <p class="product-price">44 990,-</p>
                </article>

                <article class="product">
                    <a href="produkt.php?id=8" class="product-odkaz"> <!-- Předpokládám ID 8 pro Fujifilm X-T30 III, pokud ho přidáš do DB -->

                        <img class="product-img" src="Assets/images/Fujifilm X-T30 III.webp" alt="Fujifilm X-T30-product">
                        <h4 class="procuct-name">Fujifilm X-T30 III tělo šedý + XC 13-33mm f/3.5-6.3 OIS</h4>
                    </a>
                    <p class="product-price">26 990,-</p>
                </article>

                <article class="product">
                    <a href="produkt.php?id=9" class="product-odkaz"> <!-- Předpokládám ID 9 pro Fujifilm X-E5, pokud ho přidáš do DB -->

                        <img class="product-img" src="Assets/images/Fujifilm X-E5 tělo.webp" alt="Fujifilm X-E5-product">
                        <h4 class="procuct-name">Fujifilm X-E5 tělo černý</h4>
                    </a>
                    <p class="product-price">38 990,-</p>
                </article>

            </div>

        </section>

        <?php require __DIR__ . '/partials/footer.php'; ?>