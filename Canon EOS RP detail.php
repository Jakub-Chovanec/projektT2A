<?php
declare(strict_types=1);

require __DIR__ . '/src/bootstrap.php';
?>

<?php require __DIR__ . '/partials/header.php'; ?>

<main class="main">

    <section class="product-detail">

        <div class="product-images">
            <img src="Assets/images/Canon EOS RP detail/detail 1.webp" alt="Canon EOS RP">
        </div>


        <div class="product-info">
            <h2>Canon EOS RP</h2>

        <section class="product-description">
            <h3>Popis produktu</h3>
            <p>
                Kompaktní digitální bezzrcadlovka Canon EOS RP je vybavena lehkým ergonomickým tělem
                a nejmodernějšími technologiemi, které vám poskytnou neskutečně velký tvůrčí potenciál.
                Špičkový full frame snímač Dual Pixel CMOS AF s rozlišením 26,2 Mpx
            </p>
        </section>
        <br>
        <br>

            <ul class="product-specs">
                <li>Full Frame snímač 26,2 Mpx</li>
                <li>4K video</li>
                <li>Výměnné objektivy  Canon RF</li>
                <li>Maximální rychlost sekvenčního snímání 5 sn./s</li>
            </ul>
            <br>
            <br>

            <p class="product-price">29 490,-</p>


            <a href="košík-krok-1.php" class="cart">
                Přidat do košíku
            </a>
        </div>

    </section>

    <section class="product-gallery">

    <div class="gallery-grid">
        <img src="Assets/images/Canon EOS RP detail/detail 2.webp" alt="Canon EOS RP – detail 1">
             
        <img src="Assets/images/Canon EOS RP detail/detail 3.webp" alt="Canon EOS RP – detail 2">

        <img src="Assets/images/Canon EOS RP detail/detail 4.webp" alt="Canon EOS RP – detail 3">
    </div>
</section>


</main>

<?php require __DIR__ . '/partials/footer.php'; ?>