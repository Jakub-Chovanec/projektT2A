<?php
declare(strict_types=1);

require __DIR__ . '/src/bootstrap.php';
?>

<?php require __DIR__ . '/partials/header.php'; ?>

<main class="main">

    <section class="product-detail">

        <div class="product-images">
            <img src="Assets/images/Canon EOS 250D detail/detail 1.webp" alt="Canon EOS 250D">
        </div>


        <div class="product-info">
            <h2>Canon EOS 250D</h2>

        <section class="product-description">
            <h3>Popis produktu</h3>
            <p>
                Canon 250D je dobře vybavená zrcadlovka v malém těle.
                Je to ideální volba jak pro začátečníky, tak náročnější fotografy,
                kteří chtějí mít ovládání pod kontrolou. Ovládání je intuitivní
                a celkově zrcadlovka dobře padne do ruky.
            </p>
        </section>
        <br>
        <br>

            <ul class="product-specs">
                <li>APS-C snímač 24,1 Mpx</li>
                <li>4K video</li>
                <li>Výměnné objektivy  Canon EF-S</li>
                <li>Maximální rychlost sekvenčního snímání 5 sn./s</li>
            </ul>
            <br>
            <br>

            <p class="product-price">17 990 Kč</p>


            <a href="košík-krok-1.php" class="cart">
                Přidat do košíku
            </a>
        </div>

    </section>

    <section class="product-gallery">

    <div class="gallery-grid">
        <img src="Assets/images/Canon EOS 250D detail/detail 2.webp" alt="Canon EOS 250D – detail 1">
             
        <img src="Assets/images/Canon EOS 250D detail/detail 3.webp" alt="Canon EOS 250D – detail 2">

        <img src="Assets/images/Canon EOS 250D detail/detail 4.webp" alt="Canon EOS 250D – detail 3">
    </div>
</section>


</main>

<?php require __DIR__ . '/partials/footer.php'; ?>