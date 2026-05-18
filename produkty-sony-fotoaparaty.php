<?php
declare(strict_types=1);

require __DIR__ . '/src/bootstrap.php';
?>

<?php require __DIR__ . '/partials/header.php'; ?>

    <main class="main">

        <section class="products-overview">

            <img class="banner" src="Assets/images/Sony-banner.svg" alt="">
            <h2>SONY FOTOAPARÁTY</h2>

            <div class="products">
                
                <article class="product">
                    <a href="Sony ZV-E10 detail.html" class="product-odkaz">

                        <img class="product-img" src="Assets/images/Sony Alpha ZV-E10.webp" alt="Sony ZV-E10-product">
                        <h4 class="procuct-name">Sony Alpha ZV-E10 vlogovací fotoaparát + 16–50 mm f/3,5–5,6 OSS II</h4>
                    </a>
                    <p class="product-price">18 990,-</p>
                </article>

                <article class="product">
                    <a href="Sony Alpha A7 IV detail.html" class="product-odkaz">

                        <img class="product-img" src="Assets/images/OS170b.webp" alt="Sony ZV-E10-product">
                        <h4 class="procuct-name">Sony Alpha A7 IV + FE 28–70 mm F3,5–5,6 OSS</h4>
                    </a>
                    <p class="product-price">64 402,-</p>
                </article>

                <article class="product">
                    <a href="Sony Alpha A7C II detail.html" class="product-odkaz">

                        <img class="product-img" src="Assets/images/Sony Alpha A7C II stříbrný.webp" alt="Sony ZV-E10-product">
                        <h4 class="procuct-name">Sony Alpha A7C II stříbrný</h4>
                    </a>
                    <p class="product-price">50 614,-</p>
                </article>

            </div>

        </section>

        <?php require __DIR__ . '/partials/footer.php'; ?>