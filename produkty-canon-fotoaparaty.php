<?php
declare(strict_types=1);

require __DIR__ . '/src/bootstrap.php';
?>

<?php require __DIR__ . '/partials/header.php'; ?>

    <main class="main">

        <section class="products-overview">

            <img class="banner" src="Assets/images/canon-fotoaparaty.jpg" alt="Canon banner">
            
            <h2>CANON FOTOAPARÁTY</h2>

            <div class="products">
                
                <article class="product">
                    <a href="produkt.php?id=4" class="product-odkaz"> <!-- ID 4 je Canon EOS 250D z init.php -->

                        <img class="product-img" src="Assets/images/Canon EOS 250D černý.webp" alt="Canon EOS 250D-product">
                        <h4 class="procuct-name">Canon EOS 250D černý + EF-S 18–55 mm f/4–5,6 IS STM</h4>
                    </a>
                    <p class="product-price">17 990,-</p>
                </article>

                <article class="product">
                    <a href="produkt.php?id=5" class="product-odkaz"> <!-- Předpokládám ID 5 pro Canon EOS R6 Mark III, pokud ho přidáš do DB -->

                        <img class="product-img" src="Assets/images/Canon EOS R6 Mark III.webp" alt="Canon EOS R6 Mark III-product">
                        <h4 class="procuct-name">Canon EOS R6 Mark III + RF 24-105 mm f/4-7.1 IS STM</h4>
                    </a>
                    <p class="product-price">84 490,-</p>
                </article>

                <article class="product">
                    <a href="produkt.php?id=6" class="product-odkaz"> <!-- Předpokládám ID 6 pro Canon EOS RP, pokud ho přidáš do DB -->

                        <img class="product-img" src="Assets/images/Canon EOS RP.webp" alt="Canon EOS RP-product">
                        <h4 class="procuct-name">Canon EOS RP + RF 24-105 mm f/4.0-7.1 IS STM</h4>
                    </a>
                    <p class="product-price">29 490,-</p>
                </article>

            </div>

        </section>

        <?php require __DIR__ . '/partials/footer.php'; ?>